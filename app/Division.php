<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
	protected $fillable = ['directorate_id', 'name', 'slug', 'abv'];

    public function directorate()
    {
    	return $this->belongsTo(Directorate::class, 'directorate_id');
    }
}
