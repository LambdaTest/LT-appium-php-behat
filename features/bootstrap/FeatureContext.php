<?php

require "vendor/autoload.php";

use Facebook\WebDriver\WebDriverBy;

class FeatureContext extends LambdaContext {
    /**
     * @Given I am on the proverbial home page
     */
    public function iAmOnTheProverbialHomePage()
    {
        echo "\n[DEBUG] Step: I am on the proverbial home page\n";
        try {
//            echo "[DEBUG] Current URL: " . self::$driver->getCurrentURL() . "\n";
        } catch (Exception $e) {
            echo "[ERROR] Failed to get current URL: " . $e->getMessage() . "\n";
            throw $e;
        }
    }

    /**
     * @When I click on color
     */
    public function iClickOnColor()
    {
        echo "\n[DEBUG] Step: I click on color\n";
        try {
            echo "[DEBUG] Finding element with id 'color'\n";
      $element = self::$driver->findElement(WebDriverBy::id("color"));
            echo "[DEBUG] Element found, attempting to click\n";
      $element->click();
            echo "[DEBUG] Click successful\n";
        } catch (Exception $e) {
            echo "[ERROR] Failed to click color button: " . $e->getMessage() . "\n";
            throw $e;
        }
    }

    /**
     * @When I click on text element
     */
    public function iClickOnTextElement()
    {
        echo "\n[DEBUG] Step: I click on text element\n";
        try {
            echo "[DEBUG] Finding element with id 'Text'\n";
      $element = self::$driver->findElement(WebDriverBy::id("Text"));
            echo "[DEBUG] Element found, attempting to click\n";
      $element->click();
            echo "[DEBUG] Click successful\n";
        } catch (Exception $e) {
            echo "[ERROR] Failed to click text button: " . $e->getMessage() . "\n";
            throw $e;
        }
    }

    /**
     * @When I click on notification element
     */
    public function iClickOnNotificationElement()
    {
        echo "\n[DEBUG] Step: I click on notification element\n";
        try {
            echo "[DEBUG] Finding element with id 'notification'\n";
      $element = self::$driver->findElement(WebDriverBy::id("notification"));
            echo "[DEBUG] Element found, attempting to click\n";
      $element->click();
            echo "[DEBUG] Click successful\n";
        } catch (Exception $e) {
            echo "[ERROR] Failed to click notification button: " . $e->getMessage() . "\n";
            throw $e;
        }
    }

    /**
     * @Then I click on toast element
     */
    public function iClickOnToastElement()
    {
        echo "\n[DEBUG] Step: I click on toast element\n";
        try {
            echo "[DEBUG] Finding element with id 'toast'\n";
      $element = self::$driver->findElement(WebDriverBy::id("toast"));
            echo "[DEBUG] Element found, attempting to click\n";
      $element->click();
            echo "[DEBUG] Click successful\n";
        } catch (Exception $e) {
            echo "[ERROR] Failed to click toast button: " . $e->getMessage() . "\n";
            throw $e;
        }
    }
}
