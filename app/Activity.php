<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['user_id', 'activity'];
}
