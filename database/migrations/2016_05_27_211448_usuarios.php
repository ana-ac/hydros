<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{
			$table->engine = 'mysql';
			
			$table->increments('id');
			$table->string('nombre',50);
			$table->string('apellidos',100)->nullable();
			$table->integer('telefono')->nullable();
			$table->string('email',60)->unique();
			$table->string('contraseña',60);
			$table->integer('rol')->unsigned()->default(1); // Hace referencia a la FK || Si no se especifica, por defecto será 1
			$table->boolean('estado')->default(1);
			$table->boolean('tipo')->default(0); 

			$table->timestamps(); // obligatorio para registro de 'created_at' & 'updated_at'			
			$table->rememberToken();
			//foreign keys
			$table->foreign('rol')->references('id')->on('roles');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios');
	}

}
