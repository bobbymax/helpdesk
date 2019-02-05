<?php

namespace HelpDesk;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['brand_id', 'inventory_id', 'name', 'qty', 'parent', 'in_stock'];

    public function brand()
    {
    	return $this->belongsTo(Brand::class);
    }

    public function inventory()
    {
    	return $this->belongsTo(Inventory::class);
    }
}
