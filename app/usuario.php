<?php namespace hydros_final;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {

	protected $table = 'usuarios';  // La tabla con la que se relaciona
	
	protected $hidden = array('contraseña');
	
    protected $fillable = ['id', 'nombre','apellidos','telefono','email','contraseña','rol','estado','tipo','rememberToken','created_at','updated_at'];
    // protected $guarded = ['id'];
 
        
/*    //mensajes personalizados para los fallos en la validación
    private $mensajes = array(
        'nombre.required'=>'El nombre es obligatorio',
        'min'=>'Debe tener mínimo 5 caracteres',
        'nombre.max' => 'El nombre no puede tener más de 50 caracteres',
        'descripcion.max'=>'La descripcion no puede tener más de 100 caracteres',
        'descripcion.required'=>'La descripcion es obligatorio'
    );
    
    //reglas para la validación de los campos
    private $reglas = array(
        'nombre' => 'required|Min:5|Max:50|Unique:funcionalidades',
        'descripcion'  => 'required|Min:5|Max:100'
    );

    public function validar($data){
        $v = Validator::make($data, $this->reglas,$this->mensajes);
        // return the result
        return $v;
    }
    
    */
}
