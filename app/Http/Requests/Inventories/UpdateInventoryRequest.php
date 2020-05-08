<?php

namespace App\Http\Requests\Inventories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'item_name' => 'required:inventories',
            'category' => 'required:inventories',
            'description' => 'required|unique:inventories',
            'unit_price' => 'required|unique:inventories',
            // 'brand' => 'required|unique:inventories',
            'stock_qty' => 'required|unique:inventories',
            'qty_reorder' => 'required|unique:inventories',
            'week' => 'required|unique:inventories',
            'on_order' => 'required:inventories',
            
        ];
    }
}
