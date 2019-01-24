<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'slug'];
    //protected $table = 'permissions';

    public function roles()
    {
    	return $this->belongsToMany(Role::class);
    }
}
