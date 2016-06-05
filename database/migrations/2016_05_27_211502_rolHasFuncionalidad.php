<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RolHasFuncionalidad extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('Rol_Has_Funcionalidad', function(Blueprint $table){
		
		
			$table->integer('rol')->unsigned()->index();
			$table->integer('funcionalidad')->unsigned()->index();
            
            $table->foreign('rol')->references('id')->on('roles')
            ->onUpdate('cascade')->onDelete('cascade');
            
            $table->foreign('funcionalidad')->references('id')->on('funcionalidades')
            ->onUpdate('cascade')->onDelete('cascade');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Rol_Has_Funcionalidad');
	}

}
