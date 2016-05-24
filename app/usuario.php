<?php namespace hydros_final;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {

	protected $table = 'usuarios';
    protected $fillable = ['usuario_id', 'nombre','apellidos','telefono','email','contraseña','rol','fecha_alta','estado','tipo','rememberToken','created_at','updated_at'];
    protected $guarded = ['usuario_id'];

}
