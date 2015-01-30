<?php

class ISCrazyWorldController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $posts = Entrada::paginate(2); // Consult to the database all posts published
		$posts = Entrada::orderBy('date', 'ASC')->paginate(2); // Consult to the database all posts published
		// $posts = $posts->sortBy('date'); // Sort the list of posts by date of publication
		// $posts = $posts->paginate(2); // Create the pagination of posts by the category
		return View::make('index')->with('posts', $posts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function post($id)
	{
		$post = Entrada::find($id);
		return View::make('post.index')->with('post', $post);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function category($category_name)
	{
		$category = Category::where('name', '=', $category_name)->first();
		$posts = Entrada::where('category_id', '=', $category->id); // Call the query to the database with filter post
		$posts->posts_size = $posts->count();
		$posts = $posts->orderBy('date'); // Sort the list of posts by date of publication
		$posts = $posts->paginate(2); // Create the pagination of posts by the category
		// $posts->setBaseUrl($category->name);
		return View::make('category.index')->with('category', $category)->with('posts', $posts);
	}
	// public function category($id_category)
	// {
	// 	$category = Category::find($id_category);
	// 	$posts = Entrada::where('category_id', '=', $id_category); // Call the query to the database with filter post
	// 	$posts->posts_size = $posts->count();
	// 	$posts = $posts->orderBy('date'); // Sort the list of posts by date of publication
	// 	$posts = $posts->paginate(2); // Create the pagination of posts by the category
	// 	// $posts->setBaseUrl($category->name);
	// 	return View::make('category.index')->with('category', $category)->with('posts', $posts);
	// }


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
