<?php namespace hydros_final;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Usuario extends Model {

	protected $table = 'usuarios';  // La tabla con la que se relaciona
	
	protected $hidden = array('contraseña');
	
    protected $fillable = ['nombre','apellidos','telefono','email','contraseña','rol','estado','tipo','rememberToken','created_at','updated_at'];
     protected $guarded = ['id'];
 
        
    //mensajes personalizados para los fallos en la validación
    private $mensajes = array(
        'required'=>':attribute es obligatorio',
        'between'=>':attribute debe tener entre :min - :max caracteres',
        'alpha_num' => ':attribute debe ser numérico',
        'email.unique' => 'ya existe un usuario con el mismo email',
        'rol.exists' => 'el rol que intentas utilizar no existe'
    );
    
    //reglas para la validación de los campos 
    private $reglas = array(
        'email' => 'required|email|max:50|unique:usuarios,email',
        'nombre' => 'max:50' ,
        'apellidos' => '' ,
        'telefono'  => 'regex:/[0-9]/' ,
        'contraseña' => 'sometimes|required',
        'rol' => 'required|alpha_num|exists:roles,id',
        'estado' => 'alpha_num',
        'tipo' => 'alpha_num'
    );

    public function validar($data){
        // return the result
        return Validator::make($data, $this->reglas,$this->mensajes);
    }
    
    
}
