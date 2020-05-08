@extends('layouts.app')

@section('content')

{{--Create Users Start --}}
                       
                        <div class="card card-default">
                            <div class="card-header">
                             {{isset($user) ? 'Edit User' : 'Create User' }}
                            
                            </div>
                            <div class="card-body">

                                 @if($errors->any())
                                <div class="alert allert-danger">
                                    <ul class="list-group">
                                        @foreach($errors->all() as $error)
                                        <li class="list-group-item text-danger">
                                            {{$error}}
                                        </li>
                                        @endforeach 
 
                                    </ul>
                                </div>
                                @endif  


                            <form action="{{ isset($user) ? route('users.update', $user->id) :  route('users.store') }}" method="POST" enctype="multipart/form-data">
                        
                                    @csrf

                                     @if(isset($user))

                                    @method('PUT')

                                    @endif

                                    <div class="form-group">
  
                                        <label for="first_name">First Name</label>
                                         <input type="text" id="first_name" class="form-control" name="first_name" value="{{ isset ($user) ? $user->first_name : '' }}">
                                    
                                        <label for="last_name">Last Name</label>
                                         <input type="text" id="last_name" class="form-control" name="last_name" value="{{ isset ($user) ? $user->last_name : '' }}">
                                    
                                        <label for="middle_name">Middle Name</label>
                                         <input type="text" id="middle_name" class="form-control" name="middle_name" value="{{ isset ($user) ? $user->middle_name : '' }}">
                                    

                                        <label for="email">E-Mail</label>
                                         <input type="email" id="email" class="form-control" name="email" value="{{ isset ($user) ? $user->email : '' }}">
                                        
                                         {{-- <label for="email_verified_at">Verify E-Mail</label>
                                         <input type="email_verified_at" id="email_verified_at" class="form-control" name="email_verified_at" value="{{ isset ($user) ? $user->email_verified_at : '' }}">
                                     --}}


                                        {{-- <label for="phone">Phone Number</label>
                                         <input type="text" id="phone" class="form-control" name="phone" value="{{ isset ($user) ? $user->phone : '' }}">
                                     --}}
                                        <label for="password">Password</label>
                                         <input type="password" id="password" class="form-control" name="password" value="{{ isset ($user) ? $user->password : '' }}">
                                     

                                         <label for="country_id">Country ID</label>
                                         <input type="text" id="country_id" class="form-control" name="country_id" value="{{ isset ($user) ? $user->country_id : '' }}"> 
                                    
                                        
                                        <label for="startup_type_id">StartUp ID</label>
                                         <input type="text" id="startup_type_id" class="form-control" name="startup_type_id" value="{{ isset ($user) ? $user->startup_type_id : '' }}">
                                        
                                        
                                        {{-- <select class="form-control" id="startup_type_id" name="startup_type_id" value="{{ isset ($user) ? $user->startup_type_id : '' }}">
                                            <option>Select</option>
                                            <option>Female Owned</option>
                                            <option>Female Led</option>
                                            <option>Gender Bias</option>
                                        </select>  --}}

                                        <label for="user_type_id">User ID</label>
                                         <input type="text" id="user_type_id" class="form-control" name="user_type_id" value="{{ isset ($user) ? $user->user_type_id : '' }}">
                                        
                                         
                                        {{-- 
                                        <select class="form-control" id="user_type_id" name="user_type_id" value="{{ isset ($user) ? $user->user_type_id : '' }}">
                                            <option>Select</option>
                                            <option>Investor</option>
                                            <option>Startup</option>
                                         </select> --}}

                                                                           

                                    </div>
                                        <div class="form-group">
                                            <button class="btn btn-success">
                                             {{ isset ($user) ? 'Update User' : 'Add User' }}
                                            </button>
                                        </div>
                            </form>
                            </div>
                        </div>
                                
                                
{{--Create Users End --}}
               
@endsection