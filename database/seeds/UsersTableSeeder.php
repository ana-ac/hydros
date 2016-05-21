<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder{
    
    public function run(){

        \DB::table('usuarios')->insert(
        array(
            'usuario_id' => 1,
            'nombre' => 'vadim',
            'apellidos' => 'turcanu',
            'telefono' => '687458978',
            'email' => 'vadimvt@gmail.com',
            'contraseña' => \Hash::make('vadimvt'),
             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'rol' => 1,
            'tipo' => 0, //usuario normal
            'estado' => 1
        ));
        
        \DB::table('usuarios')->insert(
        array(
            'usuario_id' => 2,
            'nombre' => 'ana',
            'apellidos' => 'arriaga',
            'telefono' => '626675887',
            'email' => 'anahydros@gmail.com',
            'contraseña' => \Hash::make('anaac'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'tipo' => 1, //usuario administrador
            'estado' => 1 //activo
        ));
    }
}

?>