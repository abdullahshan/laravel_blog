<?php

namespace App\Http\Controllers\backend;

use HashContext;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

class userController extends Controller
{
    public function usercreate(){

        $users = User::where('type','1')->with('roles')->get();

        // dd($users['0']->roles->first()->name);

        $roles = Role::all();

        return view('backend.user.add', compact('roles','users'));
    }

    //user store//
    public function userstore(Request $request){

        $old_user = User::where('email',$request->email)->first();

        if($old_user != null){

            if($old_user->email == $request->email){

                $old_user->name = $request->name;
                $old_user->type = "1";
                $old_user->email = $request->email;
                $old_user->password = Hash::make($request->password);
                $old_user->save();
            }
        }else{

            $user = new User();
    
            $user->name = $request->name;
            $user->type = "1";
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

           

            $user->assignRole($request->role);
        }
       
         return back();

            
    }

    //User edite //

    public function useredite($id){

        $roles = Role::where('name','!=','admin')->get();
    
       return view('backend.user.edit',compact('roles','id'));
    }

    //updata userRoles//

    public function rolesupdate(Request $request, $id){

// dd($request->all());

        $user = User::select('id')->where('id',$id)->first();

       $user->syncRoles($request->role);

        return redirect(route('user.add'));
    }

    //User Update //

    public function userupdate($id){

              
            $user = User::where('id',$id)->first();

            return view('backend.user.add',compact('user'));
    }

    //update store//

    public function updatestore(Request $request,$id){


            $user  = User::where('id',$id)->first();

            $user->name = $request->name;
            $user->email= $request->email;

            if($request->password != $request->conpassword){

                return Redirect::back()->withErrors(['msg' => "Password didn't match"]);

            }else{

              $user->password = Hash::make($request->password);
            }

            $user->save();

            return redirect()->route('user.add');
    }

    //usr ban//

    public function ban($id){

        $user = User::where('id',$id)->first();

        if($user->status == 1){


            $user->status = '0';
            $user->save();

        }elseif($user->status == 0){

            $user->status = '1';
            $user->save();
        }

        return back();
    }

   
}
