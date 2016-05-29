<?php namespace hydros_final;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {

	protected $table = 'usuarios';  // La tabla con la que se relaciona
	
	protected $hidden = array('contraseña');
	
    protected $fillable = ['id', 'nombre','apellidos','telefono','email','contraseña','rol','estado','tipo','rememberToken','created_at','updated_at'];
    protected $guarded = ['id'];

}
