<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Person extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'people';
	//protected $primaryKey = 'cedula';

	public function user(){
        return $this->hasOne('User');
    }

    public function admin(){
        return $this->hasOne('Admin');
    }
}
