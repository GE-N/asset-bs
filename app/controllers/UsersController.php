<?php

class UsersController extends BaseController {

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
		$users = $this->user->all();

        return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validator = Validator::make($input, User::$rules);

		if ( $validator->passes() ) {

			User::createUser($input);

			return Redirect::route('users.index');
		}

		return Redirect::route('users.create')
			->withInput()
			->withErrors($validator)
			->with('message', 'There were validation errors');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

        return View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);

        return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$user = User::findOrFail($id);

		if ( !is_null($user) ) {

			$user->updateUser($input);

			return Redirect::route('users.show', $id);
		}

		return Redirect::route('users.edit')
			->withInput()
			->with('message', 'Theres some error for update');		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Login methods
	 *
	 */

	public function login()
	{
		return View::make('users.login');
	}

	public function authenticate()
	{
		$credentials = Input::only('username', 'password');

		if (Auth::attempt($credentials)) {
			return Redirect::route('users.show', Auth::user()->id);
		}

		return Redirect::route('login');
	}
}
