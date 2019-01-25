<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name', 'slug', 'guard', 'icon', 'permission', 'url', 'archived'];
}
