<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckRights
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //return $next($request);
        $groupsArray = null;
        if (!Auth::check()) {
            //return redirect('/')->with('error','Invalid permission!');
            abort(404);
        } else {
            $id = Auth::user()->id;
            $groups = DB::table('x_groups_users')->where('user_id', $id)->select('group_id')->get();
            if($groups){
                foreach ($groups as $gr){
                    $groupsArray[] = $gr->group_id;
                }
            }
        }
        if(!empty($groupsArray) && (in_array(1, $groupsArray) || in_array(6, $groupsArray) )){
            return $next($request);
        } else {
            //$this->unlogin();
            abort(404);
        }
    }

    private function unlogin(){
        if (Auth::check()) {
            return redirect('/auth-out');
        } else {
            return redirect('/')->with('error','Invalid permission!');
        }
    }
}
