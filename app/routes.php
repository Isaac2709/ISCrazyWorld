<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
// The blog routes
Route::get('/', 'ISCrazyWorldController@index');
Route::get('post/{id}', 'ISCrazyWorldController@post');

// The routes for the managers the web site
// The main route
Route::get('admin', function()
{
	return View::make('admin.index');
});
// The controllers routes
Route::controller('admin/posts', 'PostController');
Route::controller('admin/admins', 'AdminController');
Route::controller('admin/categories', 'CategoryController');

// The filter for site administrators come
Route::get('admin/', array('before' => 'auth' , function(){
	return View::make('admin.index');
}));
Route::filter('auth', function()
{
    if (Auth::guest()) return Redirect::to('/')->with('msg', 'Debes identificarte primero.');;
});
Route::when('admin/*', 'auth');

// Routes for get and post request of laravel
Route::get('/admin_auth/login', 'AuthAdminController@getLogin');
Route::post('/admin_auth/login', 'AuthAdminController@postLogin');
Route::get('/admin_auth/logout', 'AuthAdminController@getLogout');

// Routes for ajax requests
Route::get('getTags', function(){
	if(Request::ajax()){
		$term = Input::get('tag_name');
		$data = Tag::all()->lists('name');
		$result = [];
		foreach ($data as $tag) {
			if(strpos(Str::lower($tag), Str::lower($term)) !== false){
				$result[] = $tag;
			}
		}
		return Response::json($result);
	}
});
