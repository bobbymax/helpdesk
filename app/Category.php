<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function tickets()
    {
    	return $this->hasMany(Ticket::class);
    }
}
