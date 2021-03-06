<?php

class FacebookControllerHandler extends BaseController {

	private $facebook = null;

	public function __construct()
	{
		$this->facebook = new Facebook(array(
		  'appId'  => '401612286642521',
		  'secret' => '4fc702be0b5ef42e8d620245d15c8ec1',
		));
	}

	public function checkAvailability($username)
	{
		try {
			$this->facebook->api($username);
			return Response::json(array('exists' => true),200);
		} catch(Exception $e) {
			return Response::json(array('exists' => false),200);
		}
	}

	public function checkAvailabilitySelenium($username)
	{
		$host = 'http://localhost:4444/wd/hub'; // this is the default
		//$capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'phantomjs');
		$capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'firefox');
		$driver = RemoteWebDriver::create($host, $capabilities, 5000);		
		
		// get webdriver
		$driver->get('https://www.facebook.com/' . $username);

		try {
			$driver->findElement(WebDriverBy::cssSelector('#mainContainer'));
			return Response::json(array('exists' => true),200);
		} catch(NoSuchElementException $e) {
			return Response::json(array('exists' => false),200);
		}
	}

	public function automateInput()
	{
		$firstName = Input::get('first_name');
		$lastName = Input::get('last_name');
		$email = Input::get('email');
		$email_confirmation = Input::get('email_confirmation');
		$password = Input::get('password');
		$birthday_day = Input::get('birthday_day');
		$birthday_month = Input::get('birthday_month');
		$birthday_year = Input::get('birthday_year');
		$sex = Input::get('sex');

		$host = 'http://localhost:4444/wd/hub'; // this is the default
		//$capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'phantomjs');
		$capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'firefox');
		$driver = RemoteWebDriver::create($host, $capabilities, 5000);		
		
		/*
		1º passo
		-------
		Nome proprio - id: u_0_1
		Apelido - id: u_0_3
		email - id: u_0_5
		reenter email - id: u_0_8
		password - id: u_0_a
		data dia - id: day, select name='birthday_day'
		data mes - id: month, select name='birthday_month'
		data ano - id: year, select name='birthday_year'
		sexo - Male: id: u_0_e, Female: id: u_0_d
		butão registar - id: u_0_i

		2º passo
		--------
		skip ( adicionar contactos ) selector: .uiLinkButtonInput input[name='skip']
		popup skip - selector: input[name='skip']

		3º passo
		---------
		skip ( dados adicionais ) selector: .uiLinkButtonInput input[name='skip']

		4º passo
		--------
		adicionar foto
	 	*/

		// get webdriver
		
		$driver->get('https://www.facebook.com/');
		

		$nameInput = $driver->findElement(WebDriverBy::id("u_0_1"));
		$nameInput->sendKeys($firstName); 
		
		$lastNameInput = $driver->findElement(WebDriverBy::id("u_0_3"));
		$lastNameInput->sendKeys($lastName); 

		$emailInput = $driver->findElement(WebDriverBy::id("u_0_5"));
		$emailInput->sendKeys($email); 

		$emailConfirmationInput = $driver->findElement(WebDriverBy::id("u_0_8"));
		$emailConfirmationInput->sendKeys($email_confirmation);

		$passwordInput = $driver->findElement(WebDriverBy::id("u_0_a"));
		$passwordInput->sendKeys($password);

		$selectMonth = $driver->findElement(WebDriverBy::id("month"));
		$selectObjectMonth = new WebDriverSelect($selectMonth);
		$selectObjectMonth->selectByValue($birthday_month);

		$selectYear = $driver->findElement(WebDriverBy::id("year"));
		$selectObjectYear = new WebDriverSelect($selectYear);
		$selectObjectYear->selectByValue($birthday_year);

		$selectDay = $driver->findElement(WebDriverBy::id("day"));
		$selectObjectDay = new WebDriverSelect($selectDay);
		$selectObjectDay->selectByValue($birthday_day);

		if($sex == 'male') {
			$driver->findElement(WebDriverBy::id("u_0_e"))->click();
		} else {
			$driver->findElement(WebDriverBy::id("u_0_d"))->click();
		}
		
		sleep(10);

		// submit button 
		$driver->findElement(WebDriverBy::id("u_0_i"))->click();
		
		// wait till there's no login button anymore 
		$driver->wait(80, 500)->until(function ($driver) {
			try {
				$driver->findElement(WebDriverBy::id('loginbutton'));
			} catch (Exception $e) {
				return true;
			}
		});

		//go ahead to profile picture settings
		try {
			$driver->get('https://www.facebook.com/gettingstarted/?step=upload_profile_pic');
			$driver->findElement(WebDriverBy::cssSelector("a.icon_link"))->click();

			// wait till we have the popup window to update 
			$driver->wait(20, 500)->until(function ($driver) {
			  return $driver->findElement(WebDriverBy::id('profile_picture_post_file'));
			});
			
			// select file 
			$inputFile = $driver->findElement(WebDriverBy::id('profile_picture_post_file'));
			$inputFile->setFileDetector(new LocalFileDetector())->sendKeys('/Users/miguel/pics/logo.png');
			
			// wait till the upload is made and the popup window disapear
			$driver->wait(300, 1000)->until(function ($driver) {
				try {
					$driver->findElement(WebDriverBy::id('pop_content'));
				} catch (Exception $e) {
					return true;
				}
			});

			$driver->findElement(WebDriverBy::id('nux_navigation_submit'))->click();

			return Response::json(array('success' => true),200);

		} catch (Exception $e) {
			return Response::json(array('success' => false),400);
		}
		
		return Response::json(array('success' => false),200);	
	}


	public function testingInput()
	{
		$host = 'http://localhost:4444/wd/hub'; // this is the default
		//$capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'phantomjs');
		$capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'firefox');
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