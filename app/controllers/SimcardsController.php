<?php

class SimcardsController extends BaseController {

	/**
	 * Simcard Repository
	 *
	 * @var Simcard
	 */
	protected $simcard;

	public function __construct(Simcard $simcard)
	{
		$this->simcard = $simcard;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$simcards = $this->simcard->all();

		return View::make('simcards.index', compact('simcards'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('simcards.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Simcard::$rules);

		if ($validation->passes())
		{
			$this->simcard->create($input);

			return Redirect::route('simcards.index');
		}

		return Redirect::route('simcards.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$simcard = $this->simcard->findOrFail($id);

		return View::make('simcards.show', compact('simcard'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$simcard = $this->simcard->find($id);

		if (is_null($simcard))
		{
			return Redirect::route('simcards.index');
		}

		return View::make('simcards.edit', compact('simcard'));
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
		$validation = Validator::make($input, Simcard::$rules);

		if ($validation->passes())
		{
			$simcard = $this->simcard->find($id);
			$simcard->update($input);

			return Redirect::route('simcards.show', $id);
		}

		return Redirect::route('simcards.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->simcard->find($id)->delete();

		return Redirect::route('simcards.index');
	}

}
