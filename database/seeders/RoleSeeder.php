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
        Permission::create(['name' => 'bitacora.index','descripcion'=>'Gestionar bitacora'])->syncRoles($admin, $trabajador);
        Permission::create(['name' => 'usuarios.index','descripcion'=>'Gestionar usuarios'])->syncRoles($admin);
        Permission::create(['name' => 'bom.index','descripcion'=>'Gestionar BOM'])->syncRoles($admin, $trabajador);
        Permission::create(['name' => 'reportes.index','descripcion'=>'Gestionar reportes'])->syncRoles($admin, $trabajador);
        Permission::create(['name' => 'roles.index','descripcion'=>'Gestionar roles'])->syncRoles($admin);
        Permission::create(['name' => 'empresa.index','descripcion'=>'Gestionar empresa'])->syncRoles($admin);
        Permission::create(['name' => 'nota-compra.index','descripcion'=>'Gestionar nota de compra'])->syncRoles($admin, $trabajador);
        Permission::create(['name' => 'procesos.index','descripcion'=>'Gestionar procesos'])->syncRoles($admin, $trabajador);
        Permission::create(['name' => 'pedidos.index','descripcion'=>'Gestionar pedidos'])->syncRoles($admin, $trabajador);
        Permission::create(['name' => 'mps.index','descripcion'=>'Gestionar mps'])->syncRoles($admin, $trabajador);
        Permission::create(['name' => 'pedido-cancelado.index','descripcion'=>'Gestionar pedidos cancelados'])->syncRoles($admin, $trabajador);
        Permission::create(['name' => 'maquinarias.index','descripcion'=>'Gestionar maquinarias'])->syncRoles($admin, $trabajador);
        Permission::create(['name' => 'dada-baja.index','descripcion'=>'Gestionar dada de baja de productos'])->syncRoles($admin, $trabajador);
        Permission::create(['name' => 'proveedor.index','descripcion'=>'Gestionar proveedores'])->syncRoles($admin, $trabajador);
        Permission::create(['name' => 'distribuidores.index','descripcion'=>'Gestionar distribuidores'])->syncRoles($admin, $trabajador);
    }
}
