<?php 

use Faker\Factory as Faker;

class MyTester extends TestCase{

	protected $fake;

	function __construct()
	{
		//inserting random data to database for testing
		$this->fake = Faker::create();
	}

	public function assertResponseOk()
	{
		$response = $this->client->getResponse();

		$actual = $response->getStatusCode();

		return $this->assertTrue($response->isOk(), 'Expected status code 200, got', $actual);
	}

	/**
	 * inserting random/fake data to database 
	 *
	 * @return void
	 */
	public function createUser($userField = [])
	{
		$user = array_merge([
			'username' => $this->fake->word,
			'password' => $this->fake->word,
			'email' => $this->fake->word,
			'contact' => $this->fake->word
		], $userField);

		User::create($user);

		return User::whereUsername($user['username'])->first();
	}
}

?>