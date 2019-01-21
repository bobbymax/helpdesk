<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id', 'staff_id', 'division_id', 'department_id', 'location_id', 'room_no', 'avatar'];

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function department()
    {
    	return $this->belongsTo(Department::class, 'department_id');
    }

    public function location()
    {
    	return $this->belongsTo(Location::class, 'location_id');
    }
}
