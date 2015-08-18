<?php

namespace ProjectOne\Validation;


use Violin\Violin;
use ProjectOne\User\User;

class Validator extends Violin
{
	protected $user;
	public function __construct(User $user)
	{
		$this->user = $user;
		$this->addFieldMessages([
			'email'=> [
				'uniqueEmail'=>'That email is already in use.'
			],
			'username'=>[
				'uniqueUsername'=>'Username is already in use.'
			]

		]);
	}
	public function validate_uniqueEmail($value,$input,$args)
	{
		$user = $this->user->where('email', $value);

		return ! (bool) $user->count();
	}
	public  function validate_uniqueUsername($value,$input,$args)
	{
		return ! (bool) $this->user->where('username',$value)->count();
	}

}