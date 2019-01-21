<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class LoggedIn extends Model
{
    protected $fillable = ['user_id', 'logged_in', 'count', 'attempted', 'ip_address'];
}
