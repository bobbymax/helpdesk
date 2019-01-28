<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['type_id', 'subCategory_id', 'issue', 'status', 'todo', 'archived'];

    public function type()
    {
    	return $this->belongsTo(Type::class, 'type_id');
    }

    public function subCategory()
    {
    	return $this->belongsTo(SubCategory::class, 'subCategory_id');
    }
}
