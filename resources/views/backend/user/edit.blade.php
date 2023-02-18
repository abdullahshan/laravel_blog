@extends('layouts.backendapp')

@section('content')
{{-- {{ $id }} --}}
<div class="row mt-5">
    
    <div class="col-md-9 mt-5" style="margin:auto">
        <div class="card">
            <div class="card-header">
                <h2 style="font-size: 20px;">Edite Roles</h2>
            </div>
            <div class="card-body">

            <form action="{{ route('user.rolesupdate',$id) }}" method="POST">

                @method('put')
                
                @csrf

              <div class="row">
          
                @foreach ($roles as $role)
                <div class="col-md-3 mb-5">
                    <input type="checkbox" value="{{ $role->id }}" id="role_{{ $role->id }}" name="role[]">
                    <label for="role_{{ $role->id }}">{{ ucfirst($role->name) }}</label>
                </div>
                @endforeach

                <button type="submit" class="btn btn-primary mt-5">update_roles</button>

            </form>

              </div>
            </div>
        </div>
    </div>

</div>


@endsection