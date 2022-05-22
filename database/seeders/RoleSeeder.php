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

        $admin = Role::create(['name' => 'Administrador']);
        $trabajador = Role::create(['name' => 'Trabajador']);

        //Permisos
        Permission::create(['name' => 'sistema-unidad.index','descripcion'=>'Gestionar sistema de unidades'])->syncRoles($admin, $trabajador);
        Permission::create(['name' => 'clientes.index','descripcion'=>'Gestionar clientes'])->syncRoles($admin, $trabajador);
        Permission::create(['name' => 'categoria_productos.index','descripcion'=>'Gestionar productos'])->syncRoles($admin, $trabajador);
        Permission::create(['name' => 'categoria-prima.index','descripcion'=>'Gestionar categoria materia prima'])->syncRoles($admin, $trabajador);
        Permission::create(['name' => 'productos.index','descripcion'=>'Gestionar productos'])->syncRoles($admin, $trabajador);
        Permission::create(['name' => 'materia-prima.index','descripcion'=>'Gestionar materia prima'])->syncRoles($admin, $trabajador);
        Permission::create(['name' => 'bitacora.index','descripcion'=>'Gestionar bitacora'])->syncRoles($admin);
        Permission::create(['name' => 'usuarios.index','descripcion'=>'Gestionar usuarios'])->syncRoles($admin);
    }
}
