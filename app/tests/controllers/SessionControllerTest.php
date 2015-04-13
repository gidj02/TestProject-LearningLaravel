<?php

class SessionControllerTest extends MyTester{
	/**
	 * Testing SessionController
	 */

	/** @test */

	public function it_brings_to_user_home_page_SessionController_index(){
		//insert a user that will be logged in using SessionController@index
		$testData = $this->createUser();

		//logging in the testData
		Auth::login(User::Find($testData['id']));

		//call the route of showusers: calling SessionController@index
		$response = $this->action('GET', 'SessionController@index');

		//The response must have the status code of 200
		$this->assertResponseOk();	

		//logging out;
		Auth::logout();

		//deleting the testData
		User::find($testData['id'])->delete();
	}	

	/** @test */
	public function it_brings_to_login_page_SessionController_index(){
		//call the route of index: calling SessionController@index
		$response = $this->action('GET', 'SessionController@index');

		//The response must have the status code of 200
		$this->assertResponseOk();	
	}

	/** @test */
	public function it_destroy_current_session_SessionController_destroy(){
		//insert a user that will be logged in
		$testData = $this->createUser();

		//logging in the testData
		Auth::login(User::Find($testData['id']));

		//call the route of destroy to logout the session: calling SessionController@destroy
		$response = $this->action('GET', 'SessionController@destroy');

		//assert if logged out
		$this->assertFalse(Auth::check());

		//must redirect to index route
		$this->assertRedirectedToRoute('index'); 

		//deleting the testData
		User::find($testData['id'])->delete();
	}

	/** @test */
	public function it_shows_users_profile_SessionController_profile()
	{
		//insert a user that will be viewed using UserController@profile
		$testData = $this->createUser();

		//logging in the testData
		Auth::login(User::Find($testData['id']));

		//call the route of showprofile: calling UserController@profile
		$response = $this->action('GET', 'SessionController@profile');

		//showuser view must contained/received $user
		$this->assertViewHas('user');

		//The response must have the status code of 200
		$this->assertResponseOk();		
		
		//logging out;
		Auth::logout();

		//deleting the testData
		User::find($testData['id'])->delete();
	}

	// public function it_store_user_to_database_UserController_store(){
	// 	//call the route of register: calling UserController@store
	// 	$response = $this->call('POST', 'store');

	// 	//must redirect to index route
	// 	/**
	// 	 * problem in input
	// 	 */
	// 	$this->assertRedirectedToRoute('register'); //temporary must be 'index'  when success:(
	// }
}

?>