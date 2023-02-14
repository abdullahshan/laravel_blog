<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class roleController extends Controller
{
   public function roleadd(){

        $roles = Role::where('name','!=','admin')->get();

    
        return view('backend.roles.addrole', compact('roles'));
  
   }

   public function store(Request $request){
        
        $role = Role::create(['name' => $request->role]);
        return back();
   }

//edite role//
   public function edit($id){

    $role = Role::with('permissions')->find($id);

    $haspermission = $role->permissions->pluck('id');

    // dd($haspermission);
    $permissions = Permission::all();

    return view('backend.roles.addrole', compact('role','permissions','haspermission'));

   }

   //update role//
   public function update(Request $request, $id){

          $role = Role::find($id);

           $role->name = $request->role;
           $role->save();

        //    dd($request->permissions);

        $role->syncPermissions($request->permissions);

           return back();
   }
}
