<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['name', 'slugs'];
}
