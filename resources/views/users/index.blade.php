@extends('layouts.app')

@section('content')


     <div class="card card-default">
                            <div class="card-header">Users</div>

                         <div class="card-body">
                         @if($users->count() > 0)
                            <table class="table">

                                <thead>

                                     <th>
                                        Name
                                    </th>
                                    
                                    <th>
                                        E-Mail
                                    </th>

                                     
                                    <td>
                                    
                                    
                                    </td>
                         
                                 </thead>
                            
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>
                                             {{$user->name}}
                                        </td>

                                         <td>
                                             {{$user->email}}
                                        </td>

                                      
                                        <td>
                                            @if(!$user->isAdmin())
                                            <button class="btn btn-success btn-sm" >Make Admin</button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>

                        </div>
                        </div>
                        @else
                         <h3 class="text-center">No Users Yet</h3>
                        @endif
                            </div>
                        </div>


                     

@endsection
