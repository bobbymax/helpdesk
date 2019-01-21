<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name', 'slug'];

    public function users()
    {
    	return $this->hasMany(Profile::class);
    }
}
