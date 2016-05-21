<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder{
    
    public function run(){

        \DB::table('roles')->insert(
        array(
            'rol_id' => 1,
            'nombre' => 'basico',
            'descripcion' => 'un rol basico que podrá editar documentos',
             'created_at' => Carbon::now()->format('Y-m-d H:i:s')
          
        ));
        
         \DB::table('roles')->insert(
        array(
            'rol_id' => 2,
            'nombre' => 'administrativo',
            'descripcion' => 'un rol administrativo que podrá administrar eventos, es decir utilizar la agenda /calendario',
             'created_at' => Carbon::now()->format('Y-m-d H:i:s')
          
        ));
    }
}

?>