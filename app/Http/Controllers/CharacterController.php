<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Illuminate\Support\Facades\DB;

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

	public function create(Request $request){
		$uuid = Uuid::uuid4();

		$this->validate($request, [
			'name' => 'required',
			'occupation' => 'required',
			'gender' => 'required',
			'place_of_birth' => 'required',
			'played_by' => 'required',
//			'image' => 'required',
			'bio' => 'required',
		]);
		$character = Character::create($request->all() + [ 'uuid' => $uuid->toString() ]);

		return response()->json(['data' => $character, 'status' => 201]);
	}

	public function show($uuid){
		$character = Character::where('uuid', $uuid)->firstOrFail();

		return response()->json(['data' => $character ]);
	}

	public function update($uuid, Request $request){
		$character = Character::findOrFail($uuid);

		$character->update($request->all());
	}

	public function destroy($uuid){
		Character::where('uuid', $uuid)->firstOrFail()->delete();

		return response('Deleted Character Successfully', 200);
	}
}
