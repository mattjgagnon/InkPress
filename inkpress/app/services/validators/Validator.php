<?php

namespace App\Services\Validators;

abstract class Validator
{

	protected $data;

	public $errors;

	public static $rules;

	public function __construct($data = null)
	{
		$this->data = $data ?: \Input::all();
	}

	public function passes($type = 'edit')
	{
		if ($type === 'edit') {
			$validation = \Validator::make($this->data, static::$rules);
		} else {
			$validation = \Validator::make($this->data, static::$rules_create);
		}

		if ($validation->passes()) return true;

		$this->errors = $validation->messages();

		return false;
	}

}
