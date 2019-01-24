<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['type_id', 'issue', 'status', 'todo', 'archived'];

    public function type()
    {
    	return $this->belongsTo(Type::class, 'type_id');
    }
}
