<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Middleware\verifyCategoriesCount;
use App\Inventory;

use Illuminate\Http\Request;
use App\Http\Requests\Inventories\CreateInventoryRequest;
use App\Http\Requests\Inventories\UpdateInventoryRequest;

class InventoriesController extends Controller
{


    public function __construct()
    {

        $this->middleware('verifyCategoriesCount')->only(['create','store']);

    
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventories.index')->with('inventories', Inventory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventories.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateInventoryRequest $request)
    {
        Inventory::create([
             // 'item_name' => $request->item_name,
            'category_id' => $request->category,
            'description' => $request->description,
            'unit_price' => $request->unit_price,
            'stock_qty' => $request->stock_qty,
            'qty_reorder' => $request->qty_reorder,
            'week' => $request->week,
            'on_order' => $request->on_order
            

        ]);

        session()->flash('success', 'Inventory created successfully.');

        return redirect(route('inventories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        return view ('inventories.create')->with('inventory', $inventory)->with('categories', Category::all());
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function update(UpdateInventoryRequest $request, Inventory $inventory)
    
     {
        $inventory->update([
            
            // 'item_name' => $request->item_name,
            'category_id' => $request->category,
            'description' => $request->description,
            'unit_price' => $request->unit_price,
            'stock_qty' => $request->stock_qty,
            'qty_reorder' => $request->qty_reorder,
            'week' => $request->week,
            'on_order' => $request->on_order
            
        ]);


        session()->flash('success', 'Inventory updated successfully.');

        return redirect(route('inventories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = Inventory::withTrashed()->where('id', $id)->firstOrFail();

    

        if($inventory->trashed()){
        
            $inventory->forceDelete();

        }else{
            $inventory->delete();
        }

        session()->flash('success', 'Inventory deleted successfully.');

        return redirect(route('inventories.index'));
    }

    /**
     * Trashed inventories displayed.
     *
     * @return \Illuminate\Http\Response
     */

    public function trashed()

    {
        
        $trashed = Inventory::onlyTrashed()->get();


        
        // session()->flash('success', 'Inventory trashed successfully.');
        
        return view('inventories.index')->with('inventories', $trashed);


        // return redirect(route('inventories.index'));
    }

     /**
     * Restored inventories displayed.
     *
     * @return \Illuminate\Http\Response
     */

    public function restore($id)

    {
        $inventory = Inventory::withTrashed()->where('id', $id)->firstOrFail();

        $inventory->restore();

        
        session()->flash('success', 'Inventory restored successfully.');
   
        // return redirect()->back();
        return redirect(route('inventories.index'));

    }

}
