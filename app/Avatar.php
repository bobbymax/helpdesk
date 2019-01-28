<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $fillable = ['admin_id', 'avatar'];

    public function owner()
    {
    	return $this->belongsTo(Admin::class);
    }
}
