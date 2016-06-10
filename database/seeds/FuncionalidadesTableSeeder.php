<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FuncionalidadesTableSeeder extends Seeder{
    
    public function run(){

        \DB::table('funcionalidades')->insert(
        array(
            'id' => 1,
            'nombre' => 'editor de texto',
            'descripcion' => 'Editor de texto enriquezido',
            'icono' => 'glyphicon-edit',
             'created_at' => Carbon::now()->format('Y-m-d H:i:s')
          
        ));
        
        \DB::table('funcionalidades')->insert(
        array(
            'id' => 2,
            'nombre' => 'agenda/calendario',
            'descripcion' => 'agenda / calendario para la organización del usuario y alerta de eventos',
            'icono' => 'glyphicon-calendar',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
          
        ));
    }
}

?>