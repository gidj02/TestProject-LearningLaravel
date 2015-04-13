<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	
	public $fillable = array('username', 'password', 'email', 'contact');

	public static $rules = ['username' => 'required|min:6',
										'password' => 'required|min:6|confirmed',
										'password_confirmation' => 'required|min:6',
										'email' => 'required|min:10|email',
										'contact' => 'required|min:11' ];	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
