@extends('layouts.backendapp')

@section('content')
    
@if (!isset($user))
<div class="row">
    
    <div class="col-md-6 mt-5" style="margin:auto">
        <div class="card">
            <div class="card-header">
                <h2 style="font-size: 20px;">Add User</h2>
            </div>

            @can('user create')
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <label for="">Name</label>
                    <input type="text"name="name" class="form-control mb-5">
                    <label for="">Email</label>
                    <input type="text"name="email" class="form-control mb-5">
        
                    <select name="role" id="role" class="form-control">
                      <option selected>Select a role</option>
                      @foreach ($roles as $role)
                      <option value="{{ $role->id }}">{{ $role->name }}</option>
                      @endforeach
                    </select>
                    <label for="">Password</label>
                    <input type="text"name="password" class="form-control mb-5">
                   <button class="btn btn-primary" type="submit" style="width:100%">create</button>
                </form>
            </div>
            @endcan
         
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-9 mt-5">
        <div class="card">
            <div class="card-header">
                <h2 style="font-size: 30px;">Users</h2>
            </div>
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ Str::ucfirst($user->name) }}</td>
                            <td>@isset($user->roles->first()->name)
                                {{ $user->roles->first()->name }}
                            @endisset</td>
                            <td>
                                   @can('user ban')
                                   @if ($user->status == 0)
                                   <a class="btn btn-danger @isset($user->roles->first()->name)
                                    {{ $user->roles->first()->name == 'admin' ? 'disabled' : ' ' }}
                                @endisset{{ Auth::user()->id == $user->id ? 'disabled' : ' ' }}" href="{{ route('user.ban',$user->id) }}">ban</a>
                                   @else
                                   <a class="btn btn-info {{ Auth::user()->id == $user->id ? 'disabled' : ' ' }}" href="{{ route('user.ban',$user->id) }}">active</a>
                               @endif
                               @endcan

                               @can('user edite')

                               
                               <a class="btn btn-info text-white @if (Auth::user()->id != 1)
                               @isset($user->roles->first()->name)
                               {{ $user->roles->first()->name == 'admin' ? 'disabled' : ' ' }} 
                           @endisset
                               @else
                                   
                               @endif" href="{{ route('user.userupdate',$user->id) }}">edit</a> 
                               
                          

                               <a class="btn btn-primary text-white @isset($user->roles->first()->name)
                                {{ $user->roles->first()->name == 'admin' ? 'disabled' : ' ' }}
                            @endisset" href="{{ route('user.edite',$user->id) }}">Assign_roles</a>
                               @endcan

                            </td>
            
                        </tr>
                      
                    @endforeach
              
            </table>
        </div>
    </div>
</div>


@else



<!-----User edite part form--->

<div class="row">
    
    <div class="col-md-6 mt-5" style="margin:auto">
        <div class="card">
            <div class="card-header">
                <h2 style="font-size: 20px;">Edite User</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('user.updatestore',$user->id) }}" method="post">
                    @csrf
                    <label for="">Name</label>
                    <input type="text"name="name" value="{{ $user->name }}" class="form-control mb-5">
                    <label for="">Email</label>
                    <input type="text"name="email" value="{{ $user->email }}" class="form-control mb-5">
                    <label for="">Password</label>
                    <input type="text"name="password" value="" class="form-control mb-5">
                    @error('msg')
                    <span style="color:red" class="text-danger">{{ $message }}</span>
                    <br>
                @enderror
                    <label for="">Con_Password</label>
                    <input type="text"name="conpassword" value="" class="form-control mb-5">
                    @error('msg')
                    <span style="color:red" class="text-danger">{{ $message }}</span>
                    <br>
                @enderror
                   <button class="btn btn-primary" type="submit" style="width:100%">create</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endif




@endsection