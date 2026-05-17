# Run Behat Appium PHP Tests on TestMu AI (Formerly LambdaTest)

<p align="center">
  <a href="https://www.testmuai.com/"><img src="https://img.shields.io/badge/MADE%20BY%20TestMu%20AI-000000.svg?style=for-the-badge&labelColor=000" alt="Made by TestMu AI"></a>
  <a href="https://community.testmuai.com/"><img src="https://img.shields.io/badge/Join%20the%20community-blueviolet.svg?style=for-the-badge&labelColor=000000" alt="Community"></a>
</p>

<p align="center">
<img height="500" src="https://user-images.githubusercontent.com/70570645/171988795-ed884ca8-f431-48b3-afcc-91a014fd5059.png">
</p>

_Appium is a tool for automating native, mobile web, and hybrid applications on iOS, Android, and Windows platforms. It supports iOS native apps written in Objective-C or Swift and Android native apps written in Java or Kotlin. It also supports mobile web apps accessed using a mobile browser (Appium supports Safari on iOS and Chrome or the built-in 'Browser' app on Android). Perform Appium automation tests on TestMu AI (Formerly LambdaTest) online cloud._

_Learn the basics of Appium testing on the TestMu AI (Formerly LambdaTest) platform._

## Getting Started

TestMu AI (Formerly LambdaTest) is an AI-native, multi-agent quality engineering platform that enables you to run Behat Appium PHP tests on real devices in the cloud.

Use this sample to run your Behat PHP Appium tests on the TestMu AI (Formerly LambdaTest) platform.

- [Sign up on TestMu AI](https://www.testmuai.com/register/) (Formerly LambdaTest).
- Follow the [TestMu AI Documentation](https://www.testmuai.com/support/docs/) for the full setup walkthrough.

## Table of Contents

- [Pre-requisites](#pre-requisites)
- [Run Your First Test](#run-your-first-test)
- [Executing The Tests](#executing-the-tests)

## Pre-requisites

Before you begin automation testing with Appium, you would need to follow these steps:

### Clone The Sample Project

Clone the TestMu AI (Formerly LambdaTest) [LT-appium-php-behat](https://github.com/LambdaTest/LT-appium-php-behat) repository and navigate to the code directory as shown below:

```bash
git clone https://github.com/LambdaTest/LT-appium-php-behat
cd LT-appium-php-behat
```

### Installing Project Dependencies

<details>

<summary id="summary_2"> <strong>Install PHP (latest)</strong> </summary>

Download and install the latest version of PHP in your system.

**MacOS:** Previous versions of **MacOS** have **PHP** installed by default. But for the latest **MacOS** versions starting with **Monterey**, **PHP** has to be downloaded and installed manually by using below commands:

```bash
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
brew install php
```

**Linux:**

```bash
sudo apt-get install curl libcurl3 libcurl3-dev php
```

**Windows:** You can download **PHP** from [here](http://windows.php.net/download/). Also, refer to this [documentation](http://php.net/manual/en/install.windows.php) for ensuring the accessibility of PHP through Command Prompt(cmd).

Please add php to Windows System Variables PATH.

</details>

<details>

<summary id="summary_2"> <strong>Download Composer in the project directory</strong>
</summary>

1. Download **composer** in the project directory from here ([Linux/MacOS](https://getcomposer.org/download/), [Windows](https://getcomposer.org/doc/00-intro.md#installation-windows)).

**Tip Note:**

To use the **composer** command directly, it should have been downloaded in the project directory. In windows the composer gets installed in different directory. So, copy the 'composer.phar' to the project directory using copy command:

```php
copy C:\ProgramData\ComposerSetup\bin\composer.phar
```

2. Install the composer and behat dependencies in the current project directory using the commands below:

```php
composer update
php composer.phar require phpwhois/phpwhois
php composer.phar install
php composer.phar require php-webdriver/webdriver
php composer.phar require behat/behat
```
In case of any error, please try restarting.

</details>

### Setting Up Your Authentication

Make sure you have your TestMu AI (Formerly LambdaTest) credentials with you to run test automation scripts on TestMu AI (Formerly LambdaTest).

Set TestMu AI (Formerly LambdaTest) `Username` and `Access Key` in environment variables.

**For Linux/macOS:**

```js
export LT_USERNAME=YOUR_LAMBDATEST_USERNAME \
export LT_ACCESS_KEY=YOUR_LAMBDATEST_ACCESS_KEY
```

**For Windows:**

```js
set LT_USERNAME=YOUR_LAMBDATEST_USERNAME `
set LT_ACCESS_KEY=YOUR_LAMBDATEST_ACCESS_KEY
```

### Upload Your Application

Upload your **_iOS_** application (.ipa file) or **_android_** application (.apk file) to the TestMu AI (Formerly LambdaTest) servers using our **REST API**. You need to provide your **Username** and **AccessKey** in the format `Username:AccessKey` in the **cURL** command for authentication. Make sure to add the path of the **appFile** in the cURL request. Here is an example cURL request to upload your app using our REST API:

**Using App File:**

**For Linux/macOS:**

```js
curl -u "YOUR_LAMBDATEST_USERNAME:YOUR_LAMBDATEST_ACCESS_KEY" \
--location --request POST 'https://manual-api.lambdatest.com/app/upload/realDevice' \
--form 'name="Android_App"' \
--form 'appFile=@"/Users/macuser/Downloads/proverbial_android.apk"'
```

**For Windows:**

```js
curl -u "YOUR_LAMBDATEST_USERNAME:YOUR_LAMBDATEST_ACCESS_KEY" -X POST "https://manual-api.lambdatest.com/app/upload/realDevice" -F "appFile=@"/Users/macuser/Downloads/proverbial_android.apk""
```

**Using App URL:**

**For Linux/macOS:**

```js
curl -u "YOUR_LAMBDATEST_USERNAME:YOUR_LAMBDATEST_ACCESS_KEY" \
--location --request POST 'https://manual-api.lambdatest.com/app/upload/realDevice' \
--form 'name="Android_App"' \
--form 'url="https://prod-mobile-artefacts.lambdatest.com/assets/docs/proverbial_android.apk"'
```

**For Windows:**

```js
curl -u "YOUR_LAMBDATEST_USERNAME:YOUR_LAMBDATEST_ACCESS_KEY" -X POST "https://manual-api.lambdatest.com/app/upload/realDevice" -d "{"url":"https://prod-mobile-artefacts.lambdatest.com/assets/docs/proverbial_android.apk","name":"sample.apk"}"
```

**Tip:**

- If you do not have any **.apk** or **.ipa** file, you can run your sample tests on TestMu AI (Formerly LambdaTest) by using our sample [Android app](https://prod-mobile-artefacts.lambdatest.com/assets/docs/proverbial_android.apk) or sample [iOS app](https://prod-mobile-artefacts.lambdatest.com/assets/docs/proverbial_ios.ipa).
- Response of above cURL will be a **JSON** object containing the `App URL` of the format - <lt://APP123456789123456789> and will be used in the next step.

## Run Your First Test

**Test Scenario:** Check out [FeatureContext.php](https://github.com/LambdaTest/LT-appium-php-behat/blob/master/features/bootstrap/FeatureContext.php) file to view the sample test script.

### Configuring Your Test Capabilities

You can update your custom capabilities in test scripts. In this sample project, we are passing platform name, platform version, device name and app url (generated earlier) along with other capabilities like build name and test name via capabilities object. The capabilities object in the sample code are defined as:

<Tabs className="docs__val">

<TabItem value="androidsingle-config" label="Android Single" default>

```php title="androidsingle.conf.yml"
     capabilities:
      build: "behat-appium-sample"
      name: "single-behat-test"
      isRealMobile: true
      app: "lt://proverbial-android"  //Enter your app url here
    environments:
      -
      deviceName: Galaxy S21 Ultra 5G
      platform: Android
      platformVersion: 11
```

</TabItem>
<TabItem value="iossingle-config" label="iOS Single" default>

```php title="iossingle.conf.yml"
  capabilities:
    build: "behat-appium-ios"
    name: "single-behat-test"
    isRealMobile: true
    app: "lt://proverbial-ios"    #Add app url here
  environments:
    -
    deviceName: iPhone 11
    platform: ios
    platformVersion: 14
```

</TabItem>

</Tabs>

**Info Note:**

- You must add the generated **APP_URL** to the `"app"` capability in the config file.
- You can generate capabilities for your test requirements with the help of our inbuilt Capabilities Generator tool.

### Executing The Tests

Execute the following command to run your test on TestMu AI (Formerly LambdaTest) platform:

**IOS:**

```bash
composer iossingle   #for single tests
composer iosparallel  #for parallel tests
```

**Android:**

```bash
composer androidsingle   #for single tests
composer androidparallel  #for parallel tests
```

**Info:** Your test results would be displayed on the test console (or command-line interface if you are using terminal/cmd) and on the TestMu AI (Formerly LambdaTest) App Automation Dashboard.

## LambdaTest is Now TestMu AI

On **January 12, 2026**, [LambdaTest evolved to TestMu AI](https://www.testmuai.com/lambdatest-is-now-testmuai/), the world's first fully autonomous **Agentic AI Quality Engineering Platform**.

Same team. Same infrastructure. Same customer accounts. All existing LambdaTest logins, scripts, capabilities, and integrations continue to work without change.

ð Find the new home for [LambdaTest](https://www.testmuai.com).

### How LambdaTest Evolved into TestMu AI

In 2017, we launched LambdaTest with a simple mission: make testing fast, reliable, and accessible. As LambdaTest grew, we expanded into Test Intelligence, Visual Regression Testing, Accessibility Testing, API Testing, and Performance Testing, covering the full depth of the testing lifecycle.

As software development entered the AI era, testing had to evolve, too. We rebuilt the architecture to be AI-native from the ground up, with autonomous agents that **plan, author, execute, analyze, and optimize tests** while keeping humans in the loop. The platform integrates with your repos, CI, IDEs, and terminals, continuously learning from every code change and development signal.

That evolution earned a new name: **TestMu AI**, built for an AI-first future of quality engineering. TestMu is not a new name for us. It is the name of our annual community conference, which has brought together 100,000+ quality engineers to discuss how AI would reshape testing, long before that became an industry norm. 

What started as a high-performance cloud testing platform has transformed into an AI-native, multi-agent system powering a connected, end-to-end quality layer. That evolution defined a new identity: LambdaTest evolved into TestMu AI, built for an AI-first future of quality engineering.

## Support

Got a question? Email [support@testmuai.com](mailto:support@testmuai.com) or chat with us 24x7 from our chat portal.
