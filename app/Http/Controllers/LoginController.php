<?php namespace hydros_final\Http\Controllers;

use hydros_final\Http\Requests;
use hydros_final\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use hydros_final\usuario as Usuario;
use Input;
use Auth;
use Request;
use View;
use Session;
use Hash;
use Carbon\Carbon;

//use Illuminate\Http\Request;

class LoginController extends Controller {
    
    public function logout(){
        //olvidamos el nombre del usuario logeado y redireccionamos a la página de presentación
        Session::forget('usuario');
        return redirect()->to('/');
    }
    
   
    
    public function postLogin() { //al introducir los credenciales vendrá a esta función
        $input = Input::all(); 
        
        $reglas = array( 
            'email' => 'required|email', 
            'contraseña' => 'required' );
        
        $mensajes = array( 
            'required' => ':attribute es obligatorio',
            'email' => 'debes introducir un email válido' );
        
        $validacion = Validator::make($input, $reglas, $mensajes);
        // Validamos los campos
        if($validacion->fails()){ //si no valida los datos intro
            Session::put('loginFallido', '4');
            return  redirect()->back()->withInput(Input::except('contraseña'))->withErrors($validacion->messages());	//devuelve la infrmación menos la contraseña a la página de login
        }else{
          
            $user = Usuario::login(Input::get('email'), Input::get('contraseña')); //si tiene datos validos compruba que exista el usuario con la contraseña
           
            // Si la autentificacion es correcta
            if(!is_null($user)){ // si la funcion ha devuelto un objeto
                
                //olvida la sesion de loginFallido y guarda el email
                Session::forget('loginFallido');
                Session::put('usuario', Input::get('email'));
                
                if(Usuario::isAdmin($user)){ //comprueba si el usuario es administrador o no 
                    return redirect()->to('/usuarios');
                }else{
                    $fecha = Carbon::now()->format('Y-m-d');
                    return redirect()->to('/workspace');
                }
               
            }else{
                // no lo ha encoentrado en la base de datos
                Session::put('loginFallido', '4');
                 return redirect()->back()->withInput(Input::except('contraseña'))->withErrors($validacion->messages());	
            }
        }
        Session::put('loginFallido', '4');
        return redirect()->back();
    }
}



