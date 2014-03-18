<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	public static $rules = array(
		'username'		=> 'required',
		'password'		=> 'required',
		'email'			=> 'required|email',
		'role'			=> 'in:admin,user'
	);

	public static $roles = array(
		'admin' => 'Admin', 
		'user' => 'User'
	);

	public static function createUser($params)
	{
		$newUsr = new User;

		$newUsr->username 	= $params['username'];
		$newUsr->password 	= Hash::make($params['password']);
		$newUsr->email 		= $params['email'];
		$newUsr->role 		= $params['role'];
		$newUsr->name 		= $params['name'];
		$newUsr->tel 		= $params['tel'];
		$newUsr->about 		= $params['about'];

		$isSave = $newUsr->save();

		return $isSave ? $newUsr : NULL ;
	}

	public function updateUser($params)
	{
		// $this->username 	= $params['username'];		// username not allow change.
		$this->password 	= Hash::make($params['password']);
		$this->email 		= $params['email'];
		$this->role 		= $params['role'];
		$this->name 		= $params['name'];
		$this->tel 			= $params['tel'];
		$this->about 		= $params['about'];

		$isUpdate = $this->save();

		return $isUpdate ? $this : NULL ;
	}

	/**
	 * Devices relation
	 */

	public function devices()
	{
		$devices = array(
			'phone' 	=> $this->phones,
			'simcard' 	=> $this->simcards,
			'accessory'	=> $this->accessories
		);

		return $devices;
	}

	public function phones()
	{
		return $this->hasMany('Phone');	
	}

	public function simcards()
	{
		return $this->hasMany('Simcard');
	}

	public function accessories()		
	{
		return $this->hasMany('Accessory');
	}

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
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function isAdminRole()
	{
		return $this->role == 'admin';
	}
}