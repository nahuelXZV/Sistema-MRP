<?php

namespace App\Http\Livewire\Administracion\Rol;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class LwCreate extends Component
{
    public $name;
    public $permission = [];

    public function add()
    {
        $this->validate([
            'name' => 'required|unique:roles',
        ]);
        $rol = Role::create([
            'name'=>$this->name,
            'guard_name'=>'web'
        ]);
        foreach ($this->permission as $permi) {
            $rol->givePermissionTo($permi);
        }
        return redirect()->route('roles.index');
    }

    public function limpiar()
    {
        $this->name = '';
    }

    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.administracion.rol.lw-create',compact('permissions'));
    }
}
