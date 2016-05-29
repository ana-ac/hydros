<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		
		$this->call('RolesTableSeeder');
		$this->call('FuncionalidadesTableSeeder');
		$this->call('Rol_Has_Funcionalidad_TableSeeder');
		$this->call('UsersTableSeeder');
		
	}

}

?>