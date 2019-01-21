<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{

	protected $fillable = ['category_id', 'name', 'slug', 'issues'];

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function tickets()
    {
    	return $this->hasMany(Ticket::class);
    }
    
}
