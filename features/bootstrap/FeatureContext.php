<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

require "vendor/autoload.php";

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

class FeatureContext extends LambdaContext
{
    /**
     * @Given I am on the proverbial home page
     */
    public function iAmOnTheProverbialHomePage()
    {
        echo "I am on the proverbial home page\n";
    }

    /**
     * @When I click on color
     */
    public function iClickOnColor()
    {
        $element = self::$driver->findElement(WebDriverBy::id("color"));
        $element->click();
    }

    /**
     * @When I click on text element
     */
    public function iClickOnTextElement()
    {
        $element = self::$driver->findElement(WebDriverBy::id("Text"));
        $element->click();
    }

    /**
     * @When I click on notification element
     */
    public function iClickOnNotificationElement()
    {
        $element = self::$driver->findElement(WebDriverBy::id("notification"));
        $element->click();
    }

    /**
     * @Then I click on toast element
     */
    public function iClickOnToastElement()
    {
        $element = self::$driver->findElement(WebDriverBy::id("toast"));
        $element->click();
    }

    /**
     * @AfterFeature
     */
    public static function tearDown()
    {
        if (isset(self::$driver) && self::$driver instanceof RemoteWebDriver) {
            self::$driver->quit();
            self::$driver = null;
        }
    }
}
