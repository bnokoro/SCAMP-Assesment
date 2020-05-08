<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'brand'];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

}
