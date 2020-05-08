@extends('layouts.app')

@section('content')


    <div class="card card-default">
        <div class="card-header">
           {{ isset($inventory) ? 'Edit Inventory' : 'Create Inventory'}}
        </div>
        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                    <li class="list-group-item text-danger">
                        {{$error}}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ isset($inventory) ? route('inventories.update', $inventory->id) : route('inventories.store')}}" method="POST">
                @csrf
                @if(isset($inventory))
                  @method('PUT')
                @endif
                <!-- <div class="form-group">
                <label for="category">Item Name</label>
                <input type="text" id="item_name" class="form-control" name="item_name" value="{{ isset($inventory) ? $inventory->item_name : ''  }}">
<!--                     
                    <label for="category">Item Name</label>
                    <select name="category" id="category" class="form-control" value="{{ isset($inventory) ? $inventory->category : ''  }}">
                        
                    @foreach ($errors as $category)
                          
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach  
                    </select> -->
                
                <!-- </div> --> 
                <div class="form-group">
                    <label for="category">Item Name</label>
                    <select name="category" id="category" class="form-control" value="{{ isset($inventory) ? $inventory->category : ''  }}">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}"
                           @if(isset($inventory))
                            @if($category->id == $inventory->category_id)
                                selected
                                @endif
                           @endif
                            >
                            {{$category->brand}}
                        </option>
                        @endforeach  
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" cols="3" rows="2"> {{ isset($inventory) ? $inventory->description : ''  }}</textarea>
                </div>
                <div class="form-group">
                    <label for="unit_price">Price</label>
                    <input type="text" id="unit_price" class="form-control" name="unit_price" value="{{ isset($inventory) ? $inventory->unit_price : ''  }}">
                </div>
                
                <div class="form-group">
                    <label for="stock_qty">Stock Quantity</label>
                    <input type="text" id="stock_qty" class="form-control" name="stock_qty" value="{{ isset($inventory) ? $inventory->stock_qty : ''  }}">
                </div>
                <div class="form-group">
                    <label for="qty_reorder">Reorder Quatity</label>
                    <input type="text" id="qty_reorder" class="form-control" name="qty_reorder" value="{{ isset($inventory) ? $inventory->qty_reorder : ''  }}">
                </div>
                <div class="form-group">
                    <label for="week">Inventory Time</label>
                    <input type="date" id="week" class="form-control" name="week" value="{{ isset($inventory) ? $inventory->week : ''  }}">
                </div>
                <div class="form-group">
                    <label for="on_order">Order</label>
                    <select name="on_order" id="on_order" class="form-control" value="{{ isset($inventory) ? $inventory->on_order : ''  }}">
                        <option>Select</option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
               
                <div class="form-group">
                    <button class="btn btn-success">{{isset($inventory) ? 'Update Inventory' : 'Add Inventory'}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection