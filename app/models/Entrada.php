<?php

use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Entrada extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';
	//protected $primaryKey = 'cedula';

	public function user(){
        return $this->belongsTo('User');
    }

    public function admin(){
        return $this->belongsTo('Admin');
    }

    public function tags(){
        return $this->belongsToMany('Tag', 'post_tag', 'post_id', 'tag_id');
    }

    public function category(){
        return $this->belongsTo('Category');
    }

    public function scopeDateDescending($query)
    {
        return $query->orderBy('date','ASC');
        // return $query->orderBy('date','DESC');
    }
}
