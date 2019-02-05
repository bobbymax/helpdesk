<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['name', 'slug', 'archived'];

    public function items()
    {
    	return $this->hasMany(Item::class);
    }
}
