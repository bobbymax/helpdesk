<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['directorate_id', 'abv', 'name', 'slug'];

    public function tickets()
    {
    	return $this->hasMany(Ticket::class);
    }

    public function directorate()
    {
    	return $this->belongsTo(Directorate::class, 'directorate_id');
    }
}
