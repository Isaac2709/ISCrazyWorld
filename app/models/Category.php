<?php

use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Category extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';
	//protected $primaryKey = 'cedula';

	public function posts(){
        return $this->hasMany('Post', 'category_post', 'category_id', 'post_id');
    }

    /*
    class User extends Eloquent {

	    public function roles()
	    {
	        return $this->belongsToMany('Role', 'user_roles', 'user_id', 'foo_id');
	    }

	}
     */

    // public function admin(){
    //     return $this->belongsTo('Admin');
    // }
}
