<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;
//use HelpDesk\Permission;

class Role extends Model
{
    protected $fillable = ['name', 'slug'];

    public function permissions()
    {
    	return $this->belongsToMany(Permission::class);
    }

    public function givePermissionTo(Permission $permission)
    {
    	return $this->permissions()->save($permission);
    }

    public function admins()
    {
    	return $this->belongsToMany(Admin::class);
    }

    public function assignRoleTo(Admin $admin)
    {
    	return $this->admins()->save($admin);
    }
}
