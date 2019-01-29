<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = ['user_id', 'title', 'provider', 'location', 'start_date', 'end_date', 'certificate', 'on_board', 'extra'];
    protected $dates = ['start_date', 'end_date'];

    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
