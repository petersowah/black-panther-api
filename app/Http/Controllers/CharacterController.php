<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

use Cloudinary\Uploader;

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
			'image_path' => 'required',
			'bio' => 'required',
		]);

//		dd($request->all());

		$extension = $request->image_path->extension();

		$img_path = Uploader::upload($request->file('image_path')->getRealPath(), ['public_id' => strtolower($request->input('name'). '.' .$extension), 'folder' => 'black-panther']);

		$character = Character::create(array_merge($request->all(), [ 'uuid' => $uuid->toString(), 'image_path' => $img_path['secure_url'] ]));

		return response()->json(['data' => $character, 'status' => 201]);
	}

	public function show($uuid){
		$character = Character::where('uuid', $uuid)->firstOrFail();

		return response()->json(['data' => $character ]);
	}

	public function update(Request $request, $uuid){
		$character = Character::where('uuid', $uuid)->firstOrFail();

//		dd($request->all());

		$character->update($request->all());

		return response()->json(['data' => $character, 'status' => 200]);
	}

	public function destroy($uuid){
		Character::where('uuid', $uuid)->firstOrFail()->delete();

		return response('Deleted Character Successfully', 200);
	}
}
