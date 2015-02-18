<?php

class ProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$projects = Entrada::projects();
		return View::make('admin.project.index')->with('projects', $projects);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		return View::make('admin.project.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
		return '{"upload":{"image":{"name":null,"title":null,"caption":null,"hash":"T9PjLwL","deletehash":"70X6EdrDdoym2Sf","datetime":"2015-02-07 06:04:39","type":"image\/jpeg","animated":"false","width":480,"height":360,"size":32589,"views":0,"bandwidth":0},"links":{"original":"http:\/\/i.imgur.com\/T9PjLwL.jpg","imgur_page":"http:\/\/imgur.com\/T9PjLwL","delete_page":"http:\/\/imgur.com\/delete\/70X6EdrDdoym2Sf","small_square":"http:\/\/i.imgur.com\/T9PjLwLs.jpg","large_thumbnail":"http:\/\/i.imgur.com\/T9PjLwLl.jpg"}}}';
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
	public function edit($id)
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
	public function destroy($id)
	{
		//
	}


}
