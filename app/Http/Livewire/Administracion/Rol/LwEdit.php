<?php

namespace App\Http\Livewire\Administracion\Rol;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class LwEdit extends Component
{
    public $rol;
    public $name;
    public $selectPermissions;
    public $permisosR = [];
    public $permission=[];

    public function mount($id)
    {
        $this->rol = Role::find($id);
        $this->name = $this->rol->name;
        $this->selectPermissions = $this->rol->getAllPermissions()->pluck('id')->toArray();
        foreach ($this->selectPermissions as $permiso) {
            $this->permisosR[$permiso]=$permiso;
        }
    }

    public function add()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $this->rol->name = $this->name;
        foreach ($this->selectPermissions as $permiso) {
            $this->rol->revokePermissionTo($permiso);
        }
        foreach ($this->permisosR as $permiso) {
            $this->rol->givePermissionTo($permiso);
        }
        $this->rol->save();
        return redirect()->route('roles.index');
    }

    public function limpiar()
    {
        $this->name = '';
    }

    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.administracion.rol.lw-edit',compact('permissions'));
    }
}
