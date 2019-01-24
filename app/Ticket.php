<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['ticket_code', 'user_id', 'category_id', 'issue_id', 'issue', 'complain', 'assigned_to', 'resolved', 'reopened', 'report_generated', 'priority', 'archived'];

    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function service()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function wahala()
    {
        return $this->belongsTo(Issue::class, 'issue_id');
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'admin_ticket');
    }

    public function report()
    {
        return $this->hasOne(Report::class);
    }
}
