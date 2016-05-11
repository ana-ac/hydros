<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder{
    
    public run(){
        \DB::table('Usuarios')->insert(
        array(
            'id' => 1,
            'nombre' => 'vadim',
            'apellidos' => 'turcanu',
            'contraseña' => \Hash::make('vadimvt'),
            'alias' => 'vt',
            'telefono' => '687458978',
            'email' => 'vadimvt@gmail.com',
            'fecha_alta' => '2016-08-05'
            'tipo' => 'admin',
            'rol_id' => 0
        ));
    }
}

?>