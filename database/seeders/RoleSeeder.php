<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolAdmin = Role::create(['name' => 'Admin']);
        $rolPrueba = Role::create(['name' => 'Prueba']);

        $permisousuariosindex = Permission::create(['name' => 'usuarios.index'])->syncRoles($rolAdmin);
        $permisousuarioscreate = Permission::create(['name' => 'usuarios.create'])->syncRoles($rolAdmin);
        $permisousuariosshow = Permission::create(['name' => 'usuarios.show'])->syncRoles($rolAdmin);
        $permisousuariosedit = Permission::create(['name' => 'usuarios.edit'])->syncRoles($rolAdmin);
        $permisousuariosdestroy = Permission::create(['name' => 'usuarios.destroy'])->syncRoles($rolAdmin);
        
    }
}
