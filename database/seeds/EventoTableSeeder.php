<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventoTableSeeder extends Seeder{
    
    public function run(){

        \DB::table('eventos')->insert(
        array(
            'id' => 1,
            'nombre' => 'cena aniversario',
            'descripcion' => 'restaurante tagiatella',
             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
             'fecha_cumplimiento' => Carbon::now()->format('Y-m-d H:i:s'),
             'usuario' => '1'
          
        ));
        
        \DB::table('eventos')->insert(
        array(
            'id' => 2,
            'nombre' => 'despedida de soltero',
            'descripcion' => 'fin de semana en valencia',
             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
             'fecha_cumplimiento' => Carbon::now()->format('Y-m-d H:i:s'),
             'usuario' => '2'
          
        ));
        
    }
}

?>