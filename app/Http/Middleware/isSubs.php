<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isSubs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::user()){

            $email = Auth::user()->email;

            $user_info = User::where('email',$email)->with('roles')->get();

            $user_role = $user_info->first()->roles['0']->name;

              if($user_role == 'subs'){
               
                return redirect('http://localhost:8000/');
            }else{
    
                 //nothing//
    
            }


        }

        return $next($request);
    }
}
