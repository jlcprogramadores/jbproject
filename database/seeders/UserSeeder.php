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
            'name' => 'Administrador',
            'email' => 'q@gmail.com',
            'password' => bcrypt('joseluis23'),
            'es_activo' => 1,
            'es_admin' => 1
        ])->assignRole('Admin');
        
        User::factory(100)->create();

    }
}
