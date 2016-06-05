<?php namespace hydros_final\Http\Controllers;

use hydros_final\Http\Requests;
use hydros_final\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Input;
use Auth;
use Request;
use View;

//use Illuminate\Http\Request;

class LoginController extends Controller {
    
    public function getLogin(){
        return View::make('login.login');
    }
    
    public function postLogin() {
        $email = Request::input('email');
        $password = Request::input('clave');
            
        if (Auth::attempt(['email' => $email, 'contraseña' => $password])){
            //echo "success";
            return redirect('/usuarios');
        }
        else {
            return redirect()->back()->withInput()->withErrors(['Los datos introducidos no son correctos!']);
        }
    }
}



