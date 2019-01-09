<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['ticket_code', 'department_id', 'category_id', 'room_no', 'complain', 'resolved', 'archived'];

    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function department()
    {
    	return $this->belongsTo(Department::class, 'department_id');
    }

    public function service()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'ticket_user');
    }

    public function report()
    {
        return $this->hasOne(Report::class);
    }
}
