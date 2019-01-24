<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['position', 'name', 'slug'];

    public function service()
    {
    	return $this->hasMany(Service::class);
    }
}
