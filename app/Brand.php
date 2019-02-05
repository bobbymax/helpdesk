<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'slug', 'archived'];

    public function items()
    {
    	return $this->hasMany(Item::class);
    }
}
