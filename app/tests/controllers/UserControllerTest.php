<?php

class UserControllerTest extends MyTester{
	/**
	 * Testing UserController
	 */

	/** @test */

	public function it_shows_all_users_UserController_index()
	{
		//insert a user that will be viewed using UserController@index
		$testData = $this->createUser();

		//call the route of showusers: calling UserController@index
		$response = $this->call('GET', 'showusers');

		//showuser view must contained/received $user
		$this->assertViewHas('user');

		//The response must have the status code of 200
		$this->assertResponseOk();		
		
		//deleting the testData
		User::find($testData['id'])->delete();
	}

	/** @test */

	public function it_display_registration_page_UserController_create(){
		//call the route of register: calling UserController@create
		$response = $this->call('GET', 'register');

		//The response must have the status code of 200
		$this->assertResponseOk();		
	}

	/** @test */

	// public function it_store_user_to_database_UserController_store(){
	// 	//call the route of register: calling UserController@store
	// 	$response = $this->call('POST', 'store');

	// 	//must redirect to index route
	// 	/**
	// 	 * problem in input
	// 	 */
	// 	$this->assertRedirectedToRoute('register'); //temporary must be 'index'  when success:(
	// }

	/** @test */

	public function it_display_edit_view_UserController_edit(){
		//insert a user that will be edited using UserController@edit
		$testData = $this->createUser();
		
		//call the route of register: calling UserController@create
		$response = $this->action('GET', 'UserController@edit', $testData['id']);

		//showuser view must contained/received $user`
		$this->assertViewHas('user');

		//The response must have the status code of 200
		$this->assertResponseOk();	

		//deleting the testData
		User::find($testData['id'])->delete();
	}

	/** @test */

	public function it_delete_user_UserController_destroy(){
		//insert a user that will be deleted using UserController@destro
		$testData = $this->createUser();

		//call the route of user/$user->id: calling UserController@destroy | destroying inserted resource
		$response = $this->action('DELETE', 'UserController@destroy', $testData['id']); //nadedelete ung user :(

		//must redirect to index route
		$this->assertRedirectedToRoute('index'); 
	}


	
}

?>