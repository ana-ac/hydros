<?php namespace hydros_final;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class evento extends Model {
    
    	protected $table = 'eventos';
	protected $fillable = ['id', 'nombre','descripcion','created_at','updated_at'];
    protected $guarded = ['id'];
    
     private $mensajes = array(
        'nombre.required'=>'El nombre es obligatorio',
        'nombre.min'=>'El nombre debe tener mínimo 5 caracteres',
        'descripcion.min'=>'La descripción debe tener mínimo 5 caracteres',
        'nombre.max' => 'El nombre no puede tener más de 30 caracteres',
        'descripcion.max'=>'La descripcion no puede tener más de 100 caracteres',
        'descripcion.required'=>'La descripcion es obligatoria',
        'fechaEvento.required' => 'La fecha de evento es obligatoria',
        'fechaEvento.date' => 'La fecha de evento tiene que ser una fech válida'
    );
    
    //reglas para la validación de los campos
    private $reglas = array(
        'nombre' => 'required|Min:5|Max:50|Unique:eventos',
        'descripcion'  => 'required|Min:5|Max:100',
        'fechaEvento' => 'required|date'
    );

    public function validar($data){
        $v = Validator::make($data, $this->reglas,$this->mensajes);
        // return the result
        return $v;
    }
    


}
