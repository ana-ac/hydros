<?php namespace hydros_final;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Usuario extends Model{
	protected $table = 'usuarios';  // La tabla con la que se relaciona
	
	protected $hidden = array('contraseña', 'remember_token');
	
    protected $fillable = ['nombre','apellidos','telefono','email','contraseña','rol','estado','tipo'];
    protected $guarded = ['id'];
    
    //mensajes personalizados para los fallos en la validación
    private $mensajes = array(
        'required'=>':attribute es obligatorio',
        'between'=>':attribute debe tener entre :min - :max caracteres',
        'max' => ':attribute debe tener menos de :max caracteres',
        'integer' => ':attribute debe ser numérico',
        'email.unique' => 'ya existe un usuario con el mismo email',
        'rol.exists' => 'el rol que intentas utilizar no existe'
    );
    
    //reglas para la validación de los campos 
    private $reglas = array(
        'nombre' => 'required|max:20',
        'apellidos' => 'max:30',
        'telefono'  => 'integer',
        'email' => 'required|email|max:50|unique:usuarios,email',
        'contraseña' => 'sometimes|required',
        'rol' => 'required|alpha_num|exists:roles,id',
        'estado' => 'integer',
        'tipo' => 'integer'
    );

    public function validar($data){
       $v = Validator::make($data, $this->reglas, $this->mensajes);
        // return the result
       return $v;
        
    }
    
    
}
