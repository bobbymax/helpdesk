<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function ticket()
    {
    	return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function admin()
    {
    	return $this->belongsTo(Admin::class, 'admin_id');
    }
}
