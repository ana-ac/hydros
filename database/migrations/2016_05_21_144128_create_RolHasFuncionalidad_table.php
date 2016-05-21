<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolHasFuncionalidadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('Rol_Has_Funcionalidad', function(Blueprint $table){
			$table->engine = 'mysql';
			$table->increments('id');
			$table->integer('rol')->unsigned();
            $table->integer('funcionalidad')->unsigned();
            
            $table->foreign('rol')->references('rol_id')->on('roles');
            $table->foreign('funcionalidad')->references('funcionalidad_id')->on('funcionalidades');
	
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
