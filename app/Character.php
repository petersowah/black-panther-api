<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'uuid', 'name', 'occupation', 'place_of_birth', 'gender', 'abilities', 'played_by', 'image_path', 'bio', 'alias'
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['id'];
}