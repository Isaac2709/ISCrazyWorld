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

	/**
	 * Display the login page
	 * @return [View] [The view for login of admin users]
	 */
	public function getLogin()
	{
		return View::make('admin.auth.login');
	}

	/**
	 * Check that the credentials of the user are correct
	 * @return [Redirect]
	 *         [Redirect to main page(dashboard) of admin area of the webpage if the credentials are correct or
	 *         Redirect to previous page(login page) with a error message]
	 */
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

	/**
	 * Close the current session and deletes all data session cache
	 * @return [Redirect] [The login page with a goodbye message]
	 */
	public function getLogout()
	{
		//Desconectamos al usuario
        Auth::logout();

        //Redireccionamos al inicio de la app con un mensaje
        return Redirect::to('/')->with('msg', 'Gracias por visitarnos!.');;
	}

}
