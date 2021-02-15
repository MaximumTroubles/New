<?php
namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;

/**
 *
 */
trait HasRolesAndPermissions
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    public function hasRole($role)
    {
        return $this->roles->contains('slug',$role);
    }
    public function hasPermisiion($permision)
    {
        return $this->permissions->contains('slug',$permision);
    }
}
