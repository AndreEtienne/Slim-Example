<?php
/**
 *
 * User: andre
 * Date: 16.08.2015
 * Time: 09:48
 */


namespace ProjectOne\User;

use Illuminate\Database\Eloquent\Model as Eloquent;


class User extends Eloquent
{
    protected $table = 'users';

    protected $fillable  =[
        'email',
        'username',
        'password',
        'active',
        'active_hash',
        'remember_identifier',
        'remember_token',
    ];

	public function getFullName()
	{
		if (!$this->first_name || !$this->last_name){
			return null;
		}
		return "{$this->first_name} {$this->last_name}";
	}
	public  function getFullNameOrUsername()
	{
		return $this->getFullName() ?: $this->username;
	}
	public  function activateAccount(){
		$this->update([
			'active'  => true,
			'active_hash' => null
		]);
	}
	public  function getAvatarUrl($options = []){
		$size = isset($options ['size'])? $options['size']: 45;
		return 'http://www.gravatar.com/avatar/'. md5($this->email).'?s=' .$size. '&d=identicon';

	}
}