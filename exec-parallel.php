#!/usr/bin/env php
<?php

require 'vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;

$config_file = null;

if (in_array('-c', $argv)) {
    $config_file = $argv[array_search('-c', $argv) + 1];
}

if (!$config_file) {
    die("❌ Config file not provided. Use: php exec-parallel.php -c config/parallelios.conf.yml\n");
}

$yaml = Yaml::parse(file_get_contents($config_file));
$CONFIG = $yaml["default"]["suites"]["default"]["contexts"][0]["FeatureContext"]["parameters"];

$procs = [];

foreach ($CONFIG['environments'] as $index => $env) {

    putenv("TEST_RUN_ID=$index");

    $cmd = "php vendor/bin/behat --config=" . $config_file . " 2>&1";
    echo "🚀 Running on: " . $env['deviceName'] . " (" . $env['platform'] . " " . $env['platformVersion'] . ")\n";

    $procs[$index] = popen($cmd, "r");
}

foreach ($procs as $proc) {
    while (!feof($proc)) {
        echo fgets($proc);
    }
    pclose($proc);
}