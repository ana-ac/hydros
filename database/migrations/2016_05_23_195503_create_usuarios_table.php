<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{
			$table->increments('usuario_id');
			$table->string('nombre',50);
			$table->string('apellidos',100)->nullable();
			$table->integer('telefono')->nullable();
			$table->string('email',60)->unique();
			$table->string('contraseña',60);
			$table->integer('rol')->unsigned()->nullable();
			$table->timestamps('fecha_alta');
			$table->boolean('estado')->default(1);
			$table->boolean('tipo')->default(0);
			$table->rememberToken();
			//foreign keys
			$table->foreign('rol')->references('rol_id')->on('roles');

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
