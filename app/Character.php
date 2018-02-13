<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'occupation', 'place_of_birth', 'gender', 'abilities', 'played_by', 'image'
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['id'];
}