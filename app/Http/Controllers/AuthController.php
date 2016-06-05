<?php namespace hydros_final\Http\Controllers; 

use hydros_final\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Validator;
use Input; 
use View;
use HTML;
use Redirect;
class AuthController extends Controller {

    public function showLogin(){
       /* // Verificamos que el usuario no esté autenticado
        if (Auth::check())
        {
            // Si está autenticado lo mandamos a la raíz 
            return Redirect::to('/usuarios');
        }
        // Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)
        return Redirect::to('/login');  */
        
        return View::make('login.login');
    }
    
    public function postLogin(){
       
        $input = Input::all(); 
        
        $reglas = array( 
            'email' => 'required|email', 
            'password' => 'required' );
        
        $mensajes = array( 
            'required' => ':attribute es obligatorio',
            'email' => 'debes introducir un email válido' );
        
        $validacion = Validator::make($input, $reglas, $mensajes);
        // Validamos los campos
        if($validacion->fails()){
            return  redirect()->back()->withInput(Input::except('password'))->withErrors($validacion->messages());	
        }else{
            $credentials = array( 'email' => Input::get('email') , 'password' => Input::get('password') );
        
            // Si la autentificacion es correcta
            if(Auth::atempt($credentials)){
                return View::make('vista_usuario');

            }else{
                return redirect()->to('/usuarios');
            }
        
        }
        
        return View::make('login.login')->with();
    }

}

?>