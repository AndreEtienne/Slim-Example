<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 16.08.2015
 * Time: 18:24
 */

namespace ProjectOne\Helpers;

class Hash
{
    protected $config;
    public function __construct($config){
        $this->config = $config;
    }
    public function password($password)
    {
        return password_hash(
            $password,
            $this->config->get('app.hash.algo'),

        ['cost' => $this->config->get('app.hash.cost')]

        );
    }
    public function passwordCheck($password, $hash){
        return password_verify($password,$hash);
    }
}