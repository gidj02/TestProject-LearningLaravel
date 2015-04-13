<?php

class SessionController extends \BaseController {

	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(!Auth::check())
		{
 			return View::make('pages/login');
		}

		return View::make('pages/home');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pages/login');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = Input::only(['username', 
							   'password']);

		$validator = Validator::make($inputs,[ 'username' => 'required|min:6',
            								   'password' => 'required|min:6' ]);
		if($validator->fails()){
			echo "<script type='text/javascript'>alert('Please check your inputs');</script>";
			return Redirect::route('index')->withInput()->withErrors($validator->messages());
		}

		if(Auth::attempt(['username' => $inputs['username'], 'password' => $inputs['password']]))
		{
			echo "<script type='text/javascript'>alert('Logged in!');</script>";
			return Redirect::route('index');		
		}

        return Redirect::route('index')->withInput();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		if(Auth::check())
		{
 			Auth::logout();
		}

 		return Redirect::route('index');
	}

	public function profile()
	{
		$user = User::find(Auth::user()->id);
		return View::make('pages/showprofile', compact('user'));
	}
}
