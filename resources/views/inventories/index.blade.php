@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
<a href="{{ route('inventories.create') }}" class="btn btn-success float-right">Add Inventory</a>
</div>
    <div class="card card-default">
        <div class="card-header">
            Inventories
        </div>
        <div class="card-body">
        @if($inventories->count() > 0)
            <table class="table">
                <thead>
                    <!-- <th>Item Name</th> -->
                    <th>Brand</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock Quantity</th>
                    <th>Reorder Quantity</th>
                    <th>Inventory Time</th>
                    <th>Order</th>
                </thead>
                <tbody>
                    @foreach( $inventories as $inventory )
                    <tr>
                        <!-- <td>
                            {{ $inventory->item_name }}
                        </td> -->
                        <td>
                            <a href="{{route('categories.edit', $inventory->category->id)}}">
                            {{ $inventory->category->brand }}
                            </a>
                            
                        </td>
                        <td>
                            {{ $inventory->description }}
                        </td>
                        <td>
                            {{ $inventory->unit_price }}
                        </td>
                       
                        <td>
                            {{ $inventory->stock_qty }}
                        </td>
                        <td>
                            {{ $inventory->qty_reorder }}
                        </td>
                        <td>
                            {{ $inventory->week }}
                        </td>
                        <td>
                            {{ $inventory->on_order }}
                        </td>
                        
                        @if($inventory->trashed())
                        <td>

                        <form action="{{route('restore-inventories', $inventory->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                        <button type="submit" class="btn btn-info btn-sm">Restore</button>
                        
                        </form>
                            
                        </td>
                        @else
                        <td>
                        <a href="{{ route('inventories.edit', $inventory->id )}}" class="btn btn-info btn-sm">Edit</a>  
                        </td>
                        @endif
                        
                        <td>
                        
                        <form action="{{ route('inventories.destroy', $inventory->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">{{ $inventory->trashed() ? 'Delete' : 'Trash' }}</button>
                        </form>
                       
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else 
        <h3 class="text-center">No Inventories Yet</h3>
        @endif
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="POST" id="deleteInventoryForm">
                        @csrf
                        @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Inventory</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                         <p class="p text-center text-bold">
                             Are you sure you want to delete this Inventory ?
                         </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
@endsection
@section('scripts')
        <script>
            function handleDelete(id) {

                var form = document.getElementById('deleteInventoryForm')

                form.action = '/inventories/' + id

                // console.log('deleting.', form)

                $('#deleteModal').modal('show')
            }
        </script>
@endsection