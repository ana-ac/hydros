<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Funcionalidades extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('funcionalidades', function(Blueprint $table){
			$table->engine = 'mysql';
			
			$table->increments('id');
			$table->string('nombre',50);
			$table->string('descripcion',100)->nullable();
			
			$table->timestamps(); // obligatorio para registro de 'created_at' & 'updated_at'

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('funcionalidades');
	}

}
