<?php namespace hydros_final\Http\Controllers;

use hydros_final\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use View;
class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	
	 */
	 
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}
	
		/**
	 * Get the path to the login route.
	 *
	 * @return string
	 */
	public function loginPath()
	{
		return Route('/login');
	}
	
	
	public function showLogin(){
		
		return View::make('vista_usuario');
	}
	
	public function postLogin()
	{
 
		//recogemos los campos del formulario y los guardamos en un array
		//para pasarselo al método Auth::attempt
		$userdata = array(
 
			'email' => Input::get('email'),
			'password'=> Input::get('password')
 
		); 
 
		//si los datos son correctos y existe un usuario con los mismos se inicia sesión
		//y redirigimos a la home
		if(Auth::attempt($userdata, true))
		{
 
			return Redirect::to('/usuarios');
 
		}else{
			//en caso contrario mostramos un error
			return Redirect::to('login')->with('error_login', true);
 
		}
 
	}
}
