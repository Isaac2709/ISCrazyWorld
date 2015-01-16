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

Route::get('/', 'ISCrazyWorldController@index');
Route::get('post/{id}', 'ISCrazyWorldController@post');

Route::get('admin', function()
{
	return View::make('admin.index');
});

Route::controller('admin/posts', 'PostController');

Route::controller('admin/admins', 'AdminController');

Route::get('admin/', array('before' => 'auth' , function(){
	return View::make('admin.index');
}));
Route::when('admin/*', 'auth');

Route::filter('auth', function()
{
    if (Auth::guest()) return Redirect::to('/')->with('msg', 'Debes identificarte primero.');;
});

Route::get('/admin_auth/login', 'AuthAdminController@getLogin');

Route::post('/admin_auth/login', 'AuthAdminController@postLogin');

Route::get('/admin_auth/logout', 'AuthAdminController@getLogout');

Route::get('getTags', function(){
	if(Request::ajax()){
		// $tags = Tag::all();
		$term = Input::get('tag_name');
		$data = Tag::all()->lists('name');
		$result = [];
		foreach ($data as $tag) {
			if(strpos(Str::lower($tag), Str::lower($term)) !== false){
				$result[] = $tag;
			}
			// $result[] = $tag->name;
		}
		return Response::json($result);
	}
});

Route::get('getTagss', function(){
	if(Request::ajax()){
		// $tags = Tag::all();
		// $term = Input::get('tag_name');
		$data = Tag::all()->lists('name');
		// $result = [];
		// foreach ($data as $tag) {
		// 	if(strpos(Str::lower($tag), Str::lower($term)) !== false){
		// 		$result[] = $tag;
		// 	}
		// 	// $result[] = $tag->name;
		// }
		return Response::json($data);
	}
});