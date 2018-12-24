<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Directorate extends Model
{
    protected $fillable = ['abv', 'name', 'slug'];

    public function departments()
    {
    	return $this->hasMany(Department::class);
    }
}
