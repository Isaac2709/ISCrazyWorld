<?php

class AdminController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$admins = Admin::all();
		return View::make('admin.admin.index')->with('admins', $admins);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		return View::make('admin.admin.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
		$person = new Person;
		$admin = new Admin;
		$data = Input::all();
		if($admin->isValid($data)){
			$person->name = Input::get('name');
			$person->first_surname = Input::get('first_surname');
			$person->second_surname = Input::get('second_surname');
			$person->email = Input::get('email');
			$person->phone_number = Input::get('phone_number');

			$person->save();

			$admin->people_id = $person->id;
			$admin->username = Input::get('username');
			$admin->password = Hash::make('osama8818');

			$admin->save();
			return Redirect::To('admin/admins');
		}
		else{
            return Redirect::back()->withInput()->withErrors($admin->errors);
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDelete($id)
	{
		//
	}

}
