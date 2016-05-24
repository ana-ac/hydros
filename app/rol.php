<?php namespace hydros_final;

use Illuminate\Database\Eloquent\Model;

class rol extends Model {

		protected $table = 'roles';
		protected $fillable = ['rol_id', 'nombre','descripcion','created_at','updated_at'];
        protected $guarded = ['rol_id'];

}
