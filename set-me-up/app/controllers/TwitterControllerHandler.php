<?php

class TwitterControllerHandler extends BaseController {

	public function checkAvailability($username)
	{
        $user = Twitter::getUsers(array(
            'screen_name' => $username
        ));
        //print_r($user);
        
        if(isset($user->errors)) {
        	return Response::json(array('exists' => false),200);
        } else {
        	return Response::json(array('exists' => true),200);
        }
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

	public function automateInput()
	{
		$host = 'http://localhost:4444/wd/hub'; // this is the default
		//$capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'phantomjs');
		$capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'firefox');
		$driver = RemoteWebDriver::create($host, $capabilities, 5000);		
		
		/*
		// get webdriver
		$driver->get('https://twitter.com/signup');

		$firstName = Input::get('first_name');
		$lastName = Input::get('last_name');
		$email = Input::get('email');
		$email_confirmation = Input::get('email_confirmation');
		$password = Input::get('password');
		$birthday_day = Input::get('birthday_day');
		$birthday_month = Input::get('birthday_month');
		$birthday_year = Input::get('birthday_year');
		$username = Input::get('username');
		$sex = Input::get('sex');
		$bio = Input::get('bio');
		$website = Input::get('website');

		$nameInput = $driver->findElement(WebDriverBy::cssSelector("input[name='user[name]']"));
		//$name->sendKeys($firstName + ' ' + $lastName); 
		$nameInput->sendKeys($firstName . ' ' . $lastName); 
		
		$emailInput = $driver->findElement(WebDriverBy::cssSelector("input[name='user[email]']"));
		$emailInput->sendKeys($email); 

		$passwordInput = $driver->findElement(WebDriverBy::cssSelector("input[name='user[user_password]']"));
		$passwordInput->sendKeys($password); 

		$usernameInput = $driver->findElement(WebDriverBy::cssSelector("input[name='user[screen_name]']"));
		$usernameInput->sendKeys($username); 

		$driver->findElement(WebDriverBy::cssSelector("input[name='submit_button']"))->click();

		$driver->wait(80, 500)->until(function ($driver) {
			return $driver->getCurrentURL() != 'https://twitter.com/signup';
		});
		*/
	
		$driver->get('https://twitter.com/');
		$emailInput = $driver->findElement(WebDriverBy::id('signin-email'));
		$emailInput->sendKeys('ana_cunha@mail.com');

		$passwordInput = $driver->findElement(WebDriverBy::id('signin-password'));
		$passwordInput->sendKeys('nova_p4ss');
		$driver->findElement(WebDriverBy::cssSelector('BUTTON.submit.btn.primary-btn.flex-table-btn.js-submit'))->click();
		
		$driver->wait(80, 500)->until(function ($driver) {	
			try 
			{
				$driver->findElement(WebDriverBy::cssSelector('BUTTON.submit.btn.primary-btn.flex-table-btn.js-submit'));
			} catch (Exception $e) {
				return true;
			}	
		});

		$driver->get('https://twitter.com/settings/profile');
		
		$driver->findElement(WebDriverBy::id("profile_image_upload"))->click();
		$inputFile = $driver->findElement(WebDriverBy::cssSelector("INPUT.file-input"));
		$inputFile->setFileDetector(new LocalFileDetector())->sendKeys('/Users/miguel/opensource/img/me.png');
		
		$driver->findElement(WebDriverBy::cssSelector("BUTTON.btn.primary-btn.profile-image-save"))->click();
		
	
		/* test untill popup submit button disappears which means we have uploaded the picture*/ 
		
		$driver->wait(80, 500)->until(function ($driver) {	
			try 
			{
				$driver->findElement(WebDriverBy::cssSelector("BUTTON.btn.primary-btn.profile-image-save"))->click();
			} catch(Exception $e) {
				return true;
			}
		});

		

		$inputCapaFile = $driver->findElement(WebDriverBy::cssSelector("input[name='user[profile_header_image]'].file-input"));
		$inputCapaFile->setFileDetector(new LocalFileDetector())->sendKeys('/Users/miguel/opensource/img/capa.png');
		
		$headerContainer = $driver->findElement(WebDriverBy::id("header_image_upload_dialog"));
		$headerContainer->findElement(WebDriverBy::cssSelector("BUTTON.btn.primary-btn.profile-image-save"))->click();			
				
		echo "done";
	}
}