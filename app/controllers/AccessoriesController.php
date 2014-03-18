<?php

class AccessoriesController extends BaseController {

	/**
	 * Accessory Repository
	 *
	 * @var Accessory
	 */
	protected $accessory;

	public function __construct(Accessory $accessory)
	{
		$this->accessory = $accessory;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$accessories = $this->accessory->all();

		return View::make('accessories.index', compact('accessories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('accessories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Accessory::$rules);

		if ($validation->passes())
		{
			$this->accessory->create($input);

			return Redirect::route('accessories.index');
		}

		return Redirect::route('accessories.create')
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
		$accessory = $this->accessory->findOrFail($id);

		return View::make('accessories.show', compact('accessory'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$accessory = $this->accessory->find($id);

		if (is_null($accessory))
		{
			return Redirect::route('accessories.index');
		}

		return View::make('accessories.edit', compact('accessory'));
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
		$validation = Validator::make($input, Accessory::$rules);

		if ($validation->passes())
		{
			$accessory = $this->accessory->find($id);
			$accessory->update($input);

			return Redirect::route('accessories.show', $id);
		}

		return Redirect::route('accessories.edit', $id)
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
		$this->accessory->find($id)->delete();

		return Redirect::route('accessories.index');
	}

}
