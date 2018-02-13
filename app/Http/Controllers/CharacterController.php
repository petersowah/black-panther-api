<?php

namespace App\Http\Controllers;

use App\Character;

class CharacterController extends Controller
{
	public $timestamps = false;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	public function index(){
		return response()->json(['data' => Character::all()]);
	}

	public function create(){
		
	}

	public function edit(){

	}

	public function show(){

	}

	public function destroy(){

	}
}
