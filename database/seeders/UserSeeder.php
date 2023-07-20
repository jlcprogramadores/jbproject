<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'José Luis',
            'email' => 'q@gmail.com',
            'password' => bcrypt('joseluis23'),
            'es_activo' => 1,
            'es_admin' => 1
        ])->assignRole('Admin');

        User::create([
            'name' => 'Carlos Isaí',
            'email' => 'carlos@gmail.com',
            'password' => bcrypt('Carlos1234'),
            'es_activo' => 1,
            'es_admin' => 1
        ])->assignRole('Admin');
        
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@mttoindustrialbarrios.com',
            'password' => bcrypt('Admin23.'),
            'es_activo' => 1,
            'es_admin' => 1
        ])->assignRole('Admin');

        User::create([
            'name' => 'Fianzas',
            'email' => 'finanzas@mttoindustrialbarrios.com',
            'password' => bcrypt('Finanzas23.'),
            'es_activo' => 1,
            'es_admin' => 0
        ])->assignRole('Fianzas');
        
        User::create([
            'name' => 'Recursos_Humanos',
            'email' => 'recursos_humanos@mttoindustrialbarrios.com',
            'password' => bcrypt('Recursos23.'),
            'es_activo' => 1,
            'es_admin' => 1
        ])->assignRole('Recursos Humanos');

        User::create([
            'name' => 'Administración',
            'email' => 'administracion@mttoindustrialbarrios.com',
            'password' => bcrypt('Administracion23.'),
            'es_activo' => 1,
            'es_admin' => 1
        ])->assignRole('Administración');

        User::create([
            'name' => 'Cadena De Suministros',
            'email' => 'cadena_suministros@mttoindustrialbarrios.com',
            'password' => bcrypt('Cadena23.'),
            'es_activo' => 1,
            'es_admin' => 1
        ])->assignRole('Cadena De Suministros');

        User::create([
            'name' => 'Archivos',
            'email' => 'archivos@mttoindustrialbarrios.com',
            'password' => bcrypt('Archivos23.'),
            'es_activo' => 1,
            'es_admin' => 1
        ])->assignRole('Archivos');
        
        // User::factory(100)->create();

    }
}
