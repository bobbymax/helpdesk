<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['division_id', 'department_id', 'type_id', 'description'];

    public function type()
    {
    	return $this->belongsTo(Type::class, 'type_id');
    }

    public function division()
    {
    	return $this->belongsTo(Division::class, 'division_id');
    }

    public function department()
    {
    	return $this->belongsTo(Department::class, 'department_id');
    }
}
