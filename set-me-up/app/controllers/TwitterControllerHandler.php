<?php

class TwitterControllerHandler extends BaseController {


	public function checkAvailability($username)
	{
        $user = Twitter::getUsers(array(
            'screen_name' => $username
        ));
        print_r($user);
	}

	public function checkAvailabilitySelenium($username)
	{
		$host = 'http://localhost:4444/wd/hub'; // this is the default
		//$capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'phantomjs');
		$capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'phantomjs');
		$driver = RemoteWebDriver::create($host, $capabilities, 5000);		
		
		// get webdriver
		$driver->get('https://twitter.com/' . $username);

		try {
			$driver->findElement(WebDriverBy::cssSelector('.dashboard'));
			echo "exists";
		} catch(exception $e) {
			echo "does not exist";
		}
	}


	public function testingInput()
	{
		$host = 'http://localhost:4444/wd/hub'; // this is the default
		//$capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'phantomjs');
		$capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'phantomjs');
		$driver = RemoteWebDriver::create($host, $capabilities, 5000);		
		
		// get webdriver
		$driver->get('https://twitter.com/signup');

		$name = $driver->findElement(WebDriverBy::cssSelector("input[name='user[name]']"));
		$name->sendKeys('Miguel Loureiro'); 
		
		$email = $driver->findElement(WebDriverBy::cssSelector("input[name='user[email]']"));
		$email->sendKeys('mdiasloureiro@gmail.com'); 

		$password = $driver->findElement(WebDriverBy::cssSelector("input[name='user[user_password]']"));
		$password->sendKeys('p4ssw04rd!'); 

		$username = $driver->findElement(WebDriverBy::cssSelector("input[name='user[screen_name]']"));
		$username->sendKeys('mloureiro'); 
		
		echo "done";
	}
}