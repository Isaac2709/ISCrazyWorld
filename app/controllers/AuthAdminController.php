<?php

class AuthAdminController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getLogin()
	{
		return View::make('admin.auth.login');
	}

	public function postLogin()
	{
		$credentials = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);
		if(Auth::attempt($credentials, Input::get('remember', 0))){
			return Redirect::to('admin');
		}
		else{
			return "Nombre de usuario o contraseña incorrecta";
		}
		// return View::make('auth.login');
	}

	public function getLogout()
	{
		//Desconectamos al usuario
        Auth::logout();

        //Redireccionamos al inicio de la app con un mensaje
        return Redirect::to('/')->with('msg', 'Gracias por visitarnos!.');;
	}

}
