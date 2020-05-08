<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use SoftDeletes;
    
    protected $fillable = [ 'category_id','description', 'unit_price', 'stock_qty', 'qty_reorder','week','on_order' ];

public function category()
{
    return $this->belongsTo(Category::class);
}


}
