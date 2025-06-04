<?php

require 'vendor/autoload.php';

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

class LambdaContext implements Behat\Behat\Context\Context
{
    protected static $CONFIG;
    protected static $driver;
    protected static $LTUSER;
    protected static $LTKEY;

    private static function log($msg) {
        echo "[" . date('Y-m-d H:i:s') . "] $msg\n";
    }

    public function __construct($parameters){
        self::log("Initializing LambdaContext with parameters:");
        print_r($parameters);
        
        self::$CONFIG = $parameters;
        self::$LTUSER = $parameters['user'];
        self::$LTKEY = $parameters['key'];

        self::log("Using credentials:");
        self::log("Username: " . self::$LTUSER);
        self::log("Server: " . self::$CONFIG['server']);
        self::log("PHP Version: " . phpversion());
        self::log("Environment Variables:");
        print_r($_ENV);
        self::log("getenv('LT_USERNAME'): " . getenv('LT_USERNAME'));
        self::log("getenv('LT_ACCESS_KEY'): " . getenv('LT_ACCESS_KEY'));

        // Check if driver has been created, if false then create it
        if( !self::$driver ) {
            self::log("Creating new driver instance");
            self::createDriver();
        }
    }

    public static function createDriver() {
        try {
        $test_run_id = getenv("TEST_RUN_ID") ? getenv("TEST_RUN_ID") : 0; 
        $url = "http://" . self::$LTUSER . ":" . self::$LTKEY . "@" . self::$CONFIG['server'] .":80/wd/hub";
            self::log("Hub URL: $url");

        $caps = self::$CONFIG["environments"][$test_run_id];
            self::log("Environment capabilities:");
            print_r($caps);

        foreach (self::$CONFIG["capabilities"] as $capsName => $capsValue) {
                if(!array_key_exists($capsName, $caps)) {
                $caps[$capsName] = $capsValue;
        }
            }
            self::log("Final capabilities after merge:");
            print_r($caps);

            self::log("Attempting to create RemoteWebDriver...");
            // Try to log the request payload
            self::log("Request payload to Appium:");
            print_r([
                'url' => $url,
                'capabilities' => $caps
            ]);
            self::$driver = RemoteWebDriver::create($url, $caps, 120000, 120000);
            self::log("RemoteWebDriver created successfully");
        } catch (Exception $e) {
            self::log("[ERROR] Failed to create driver: " . $e->getMessage());
            self::log("[ERROR] Stack trace:\n" . $e->getTraceAsString());
            throw $e;
        }
    }

    /** @AfterFeature */
    public static function tearDown()
    {
        if(self::$driver) {
            self::log("Quitting driver");
        self::$driver->quit();
        }
    }
}
?>
