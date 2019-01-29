<?php

namespace HelpDesk;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tickets()
    {
        return $this->belongsToMany(Ticket::class, 'admin_ticket');
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function profilePicture()
    {
        return $this->hasOne(Avatar::class);
    }

    public function actAs(Role $role)
    {
        return $this->roles()->save($role);
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('slug', $role);   
        }

        foreach ($role as $r) {
            if ($this->hasRole($r->slug)) {
                return true;
            }
        }

        return false;
    }
}
