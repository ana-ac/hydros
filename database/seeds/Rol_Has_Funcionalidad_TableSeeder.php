<?php

use Illuminate\Database\Seeder;

class Rol_Has_Funcionalidad_TableSeeder extends Seeder{
    
    public function run(){

        \DB::table('Rol_Has_Funcionalidad')->insert(
        array(
            'id' => 1,
            'rol' => 1,
            'funcionalidad' => 1
        ));
        
         \DB::table('Rol_Has_Funcionalidad')->insert(
        array(
            'id' => 2,
            'rol' => 2,
            'funcionalidad' => 2
        ));
    }
}

?>