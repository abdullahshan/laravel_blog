<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class socaial_loginController extends Controller

{

    // Login with google//

    public function google_login(){

        return Socialite::driver('google')->redirect();
  
    }

//Redirect with user information url//
    public function google_redirect(){

        $user = Socialite::driver('google')->user();
        
        $newUser = User::updateOrCreate([
            'email' => $user->email,
        ], [
            'name' => $user->name,
            'email' => $user->email,
            'password' => Hash::make(uniqid()),
        ]);

        Auth::login($newUser);
     
        $newUser_email = $newUser->email;
        $user_info = User::where('email',$newUser_email)->with('roles')->get();
   
        if(count($user_info->first()->roles) <= 0){

            $newUser->assignRole('subs');
        }

        $user_info = User::where('email',$newUser_email)->with('roles')->get();
        $user_role =  $user_info->first()->roles['0']->name;

        if($user_role == 'subs'){

            return redirect('http://localhost:8000/');

        }else{

            return redirect('http://localhost:8000/deshboard');

        }
     
    }



    // Login With facebook//

    public function facebook_login(){

        return Socialite::driver('facebook')->redirect();

    }
    public function facebook_redirect(){

        $user = Socialite::driver('facebook')->user();
        
        $newUser = User::updateOrCreate([
            'email' => $user->email,
        ], [
            'name' => $user->name,
            'email' => $user->email,
            'password' => Hash::make(uniqid()),
        ]);

        Auth::login($newUser);
     
        $newUser_email = $newUser->email;
        $user_info = User::where('email',$newUser_email)->with('roles')->get();
   
        if(count($user_info->first()->roles) <= 0){

            $newUser->assignRole('subs');
        }

        $user_info = User::where('email',$newUser_email)->with('roles')->get();
        $user_role =  $user_info->first()->roles['0']->name;

        if($user_role == 'subs'){

            return redirect('http://localhost:8000/');

        }else{

            return redirect('http://localhost:8000/deshboard');

        }
    }


    //github Login//

    public function github_login(){

        return Socialite::driver('github')->redirect();
      
      
    }

    //Hithub redirect with user information//

    public function github_redirect(){

        $user = Socialite::driver('github')->user();
        
        $newUser = User::updateOrCreate([
            'email' => $user->email,
        ], [
            'name' => $user->nickname,
            'email' => $user->email,
            'password' => Hash::make(uniqid()),
        ]);

        Auth::login($newUser);
     
        $newUser_email = $newUser->email;
        $user_info = User::where('email',$newUser_email)->with('roles')->get();
   
        if(count($user_info->first()->roles) <= 0){

            $newUser->assignRole('subs');
        }

        $user_info = User::where('email',$newUser_email)->with('roles')->get();
        $user_role =  $user_info->first()->roles['0']->name;

        if($user_role == 'subs'){

            return redirect('http://localhost:8000/');

        }else{

            return redirect('http://localhost:8000/deshboard');

        }
       
    }
}
