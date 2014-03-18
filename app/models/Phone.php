<?php

class Phone extends Device {

	protected $guarded = array();

	public static $rules = array(
		'brand' => 'required',
		'model' => 'required',
		'resolution' => 'required',
		'os' => 'required',
		'color' => 'required',
		'adaptor' => 'required',
		'cable' => 'required',
	);

	public function alias()
	{
		return $this->brand." ".$this->model;
	}
}
