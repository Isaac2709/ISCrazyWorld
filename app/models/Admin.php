<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Admin extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $primaryKey = 'people_id';
	protected $table = 'admins';
	public $errors;
	//protected $primaryKey = 'cedula';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function person(){
        return $this->belongsTo('Person' , 'people_id');
    }

    public function posts(){
        return $this->hasMany('Post' , 'admin_id');
    }

    public function isValid($data)
    {
        $rules = array(
            'username' => 'required | max:30 | min:6 | unique:Admins',
            'name' => 'required | max:30',
            'first_surname' => 'required | max:30',
            'second_surname' => 'required | max:30',
            'email' => 'required | email | unique:people,email',
            'phone_number' => 'required | min:8 | max:14'
        );

        $validator = Validator::make($data, $rules);

        if ($validator->passes())
        {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }

     public function isValidToEdit($data)
    {
        $rules = array(
            'cedula' => 'required | max:11 | min:9',
            'nombre' => 'required | max:30',
            'apellido1' => 'required | max:30',
            'apellido2' => 'required | max:30',
            'email' => 'required | email',
            'sexo' => 'required | min:1 | max:1'
        );


        $validator = Validator::make($data, $rules);

        if ($validator->passes())
        {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }

}
