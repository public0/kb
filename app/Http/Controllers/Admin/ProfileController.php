<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(Request $request){
        $data= [];
        $id = Auth::id();
        if(!empty($_POST)){
            $pass = $request->input('Password');
            $repass = $request->input('RetypePassword');
            $validated = $request->validate([
                'Password' => 'required|regex:/^\S*(?=\S{10,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/i',
                'RetypePassword' => 'required|regex:/^\S*(?=\S*['.$pass.'])\S*$/i',
            ]);
            $password = Hash::make($pass);
            if(!empty($id)){
                try{
                    DB::table('users')->where('id', $id)->update(
                        ['password' => $password]
                    );
                } catch (\Exception $e){
                    return Redirect::back()->with('error','DB Error !');
                }
            } else {
                return Redirect::back()->with('error','Auth Error !');
            }
            return Redirect::back()->with('message','Operation Successful !');
        }
        return view('admin/profile', $data);
    }
}