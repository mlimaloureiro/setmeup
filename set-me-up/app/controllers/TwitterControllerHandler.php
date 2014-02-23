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
		
		// open twitter signup page
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


		$nameInput = $driver->findElement(WebDriverBy::cssSelector("input[name='user[name]']"));
		$nameInput->sendKeys($firstName . ' ' . $lastName); 
		
		$emailInput = $driver->findElement(WebDriverBy::cssSelector("input[name='user[email]']"));
		$emailInput->sendKeys($email); 

		$passwordInput = $driver->findElement(WebDriverBy::cssSelector("input[name='user[user_password]']"));
		$passwordInput->sendKeys($password); 

		$usernameInput = $driver->findElement(WebDriverBy::cssSelector("input[name='user[screen_name]']"));
		$usernameInput->sendKeys($username); 
		
		// wait till we have an username ok 
		$driver->wait(80, 300)->until(function ($driver) {
			try {
				$container = $driver->findElement(WebDriverBy::cssSelector("DIV.prompt.username"));
				$container->findElement(WebDriverBy::cssSelector("P.ok.isaok.active"));
				return True;
			} catch(Exception $e) {
				;
			}
		});
		

		$driver->findElement(WebDriverBy::cssSelector("INPUT.submit.button.promotional"))->click();

		$driver->wait(80, 500)->until(function ($driver) {
			return $driver->getCurrentURL() != 'https://twitter.com/signup';
		});
		

		// goes to profile settings
		$driver->get('https://twitter.com/settings/profile');
		
		sleep(10);

		// upload profile image 
		$driver->findElement(WebDriverBy::id("profile_image_upload"))->click();
		$inputFile = $driver->findElement(WebDriverBy::cssSelector("INPUT.file-input"));
		$inputFile->setFileDetector(new LocalFileDetector())->sendKeys('/Users/miguel/pics/logo.png');
		
		$driver->findElement(WebDriverBy::cssSelector("BUTTON.btn.primary-btn.profile-image-save"))->click();
		
		// test untill popup submit button disappears which means we have uploaded the picture

		$driver->wait(80, 500)->until(function ($driver) {	
			try 
			{
				$driver->findElement(WebDriverBy::cssSelector("BUTTON.btn.primary-btn.profile-image-save"))->click();
			} catch(Exception $e) {
				// when we can no longer click the button it 
				// means the modal is closed
				return true;
			}
		});

		// insert cover picture
		$inputCoverFile = $driver->findElement(WebDriverBy::cssSelector("input[name='user[profile_header_image]'].file-input"));
		$inputCoverFile->setFileDetector(new LocalFileDetector())->sendKeys('/Users/miguel/pics/cover.jpg');
		
		$headerContainer = $driver->findElement(WebDriverBy::id("header_image_upload_dialog"));
		$headerContainer->findElement(WebDriverBy::cssSelector("BUTTON.btn.primary-btn.profile-image-save"))->click();			
		
		return Response::json(array('success' => false),200);

	}
}