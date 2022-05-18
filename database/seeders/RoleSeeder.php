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
        //Roles

        $admin = Role::create(['name'=>'Administrador']);
        $trabajador = Role::create(['name'=>'Trabajador']);

        //Permisos
        Permission::create(['name'=>'sistema-unidad.index'])->syncRoles($admin,$trabajador);
        Permission::create(['name'=>'clientes.index'])->syncRoles($admin,$trabajador);
        Permission::create(['name'=>'categoria_productos.index'])->syncRoles($admin,$trabajador);
        Permission::create(['name'=>'categoria-prima.index'])->syncRoles($admin,$trabajador);
        Permission::create(['name'=>'productos.index'])->syncRoles($admin,$trabajador);
        Permission::create(['name'=>'materia-prima.index'])->syncRoles($admin,$trabajador);
        Permission::create(['name'=>'bitacora.index'])->syncRoles($admin);
        Permission::create(['name'=>'usuarios.index'])->syncRoles($admin);
    }
}
