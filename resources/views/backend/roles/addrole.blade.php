@extends('layouts.backendapp')

@section('content')

    @if (!isset( $roles))

    <div class="row">
        <div class="col-lg-6 mx-auto mt-5">
         <div class="card">
             <div class="card-header">
                 <h3>Add Role</h3>
             </div>
             <div class="card-body">

                <form action="{{ route('role.update', $role->id) }}" method="post">
                    @method("PUT")
                    @csrf
                     <input type="text" class="form-control" name="role" value="{{ $role->name }}">
                     <button class="btn btn-primary mt-5" style="width:100%">submit</button>
             </div>
            </div>
        </div>
    </div>
          
    
               
                 <div class="card">
                     <div class="card-header">
                         <h3>Selcet Permissions</h3>
                     </div>
                     <div class="card-body">
                       <div class="row">

                           @forelse ($permissions as $key=> $permission)
                           <div class="col-md-3" style="margin: 10px 0px;">
                            <input type="checkbox" id="permission_"@isset($permissions)
                                     {{ $permission->id }}
                            @endisset name="permissions[]" value="{{ $permission->id }}"
                            
                                @isset($haspermission)
                                    {{ $haspermission->search($permission->id )? 'checked' : '' }}
                                @endisset
                            >
                            <label for="permission_"@isset($permissions)
                            {{ $permission->id }}
                            @endisset>@isset($permissions)
                            {{ $permission->name }}
                            @endisset</label>
                        </div>

                           @empty
                               <h1 class="text-danger">No permissions</h1>
                           @endforelse
                       </div>
                     </div>
                 </div>
               
             

            </form>
     
      
        @else
          
      

  <div class="row">
    <div class="col-lg-6 mx-auto mt-5">
     <div class="card">
         <div class="card-header">
             <h3>Add Role</h3>
         </div>
         <div class="card-body">
             <form action="{{ route('role.store') }}" method="post">
                 @csrf
                 <input type="text" class="form-control" name="role" placeholder="role">
                 <button class="btn btn-primary mt-5" style="width:100%">submit</button>
             </form>
         </div>
     </div>
    </div>
   </div>
 
   <br>
 
   <div class="row">
     <div class="col-lg-6 mx-auto mt-5">
      <div class="card">
          <div class="card-header">
              <h2 style="font-size: 20px;">All Role</h2>
          </div>
          <div class="card-body">
             <table class="table">
                 <thead style="background-color: black;color:rgb(248, 238, 238);">
                   <tr>
                     <th scope="col">SL</th>
                     <th scope="col">Name</th>
                     <th scope="col">Actions</th>
                   </tr>
                 </thead>
                 <tbody>
                   <tr>
 
                    @foreach ($roles as $key=> $role)
                  <tr>
                     <td>{{ ++$key }}</td>
                     <td>{{ $role->name }}</td>
                     <td><a href="{{ route('role.edit', $role->id) }}" class="btn btn-primary">edit</a></td>
                  </tr>
                    @endforeach
                   </tr>
                 </tbody>
               </table>
          </div>
      </div>
     </div>
    </div>
    @endif

   

@endsection