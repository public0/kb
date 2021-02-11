<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\UserGroups;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(){
        $users = DB::table('users')->orderBy('id','desc')->get();
        for($i=0; $i<count($users); $i++){
            $groups = DB::table('x_groups_users')
                ->join('user_groups', 'x_groups_users.group_id', '=', 'user_groups.id')
                ->select('user_groups.name')
                ->where('user_id', $users[$i]->id)
                ->get();
            $cnt = '';
            foreach($groups as $gr){
                $cnt .= $gr->name.', ';
            }
            $users[$i]->groups = $cnt;
        }

        $data= ['users'=> $users];
        return view('admin/users', $data);
    }

    public function add(Request $request){
        $groups = UserGroups::all();
        $data = ['groups' => $groups];

        if(!empty($_POST)){
            $name = trim($_POST['name']);
            $surname = trim($_POST['surname']);
            $email = trim($_POST['email']);
            $status = $_POST['status'];
            //$password = $_POST['password'];

            $validated = $request->validate([
                'name' => 'required|max:255',
                'surname' => 'required|max:255',
                'email' => 'required|unique:users|max:255|email:rfc,dns',
                'status' => 'required|integer|max:1',
                'groups' => 'required',
            ]);

            try{
                $user = new User;
                $user->name = $name;
                $user->surname = $surname;
                $user->email = $email;
                $user->status = $status;
                $user->password = Hash::make('xoxoxo34*xox');
                $user->save();
                $last_id = $user->id;
            } catch (\Exception $e){
                return Redirect::back()->with('error','DB Error !');
            }

            $groups = (!empty($_POST['groups'])) ? $_POST['groups'] : null;

            if(!empty($groups) && $groups && $last_id){
                foreach($groups as $gid){
                    try{
                        DB::table('x_groups_users')->insert(['user_id' => $last_id, 'group_id' => $gid]);
                    } catch (\Exception $e){
                        return Redirect::back()->with('error','DB Error !');
                    }
                }
            }

            return Redirect::back()->with('message','Operation Successful !');

        }
        return view('admin/users-add', $data);
    }

    public function edit(Request $request){

        $id = $request->id;
        $groupss = UserGroups::all();
        $users = DB::table('users')->where('id',$id)->get();

        for($i=0; $i<count($users); $i++){
            $groups = DB::table('x_groups_users')
                ->join('user_groups', 'x_groups_users.group_id', '=', 'user_groups.id')
                ->select('user_groups.id')
                ->where('user_id', $users[$i]->id)
                ->get();

            foreach($groups as $gr){
                $users[$i]->groups[] = $gr->id;
            }
        }

        $data= ['users'=> $users[0], 'groups' => $groupss];

        if(!empty($_POST)){

            $name = trim($_POST['name']);
            $surname = trim($_POST['surname']);
            $email = trim($_POST['email']);
            $status = $_POST['status'];
            $groups = (!empty($_POST['group'])) ? $_POST['group'] : null;

            if($email != $users[0]->email){
                $validated = $request->validate([
                    'name' => 'required|max:255',
                    'surname' => 'required|max:255',
                    'email' => 'required|unique:users|max:255|email:rfc,dns',
                    'status' => 'required|integer|max:1',
                    'groups' => 'required',
                ]);
            } else {
                $validated = $request->validate([
                    'name' => 'required|max:255',
                    'surname' => 'required|max:255',
                    'status' => 'required|integer|max:1',
                    'groups' => 'required',
                ]);
            }

            DB::table('users')->where('id', $id)->update(
                ['name' => $name, 'surname' => $surname, 'email' => $email, 'password' => 'old', 'status' => $status]
            );

            $groups = (!empty($_POST['groups'])) ? $_POST['groups'] : null;
            if(!empty($groups) && $groups && $id){
                DB::table('x_groups_users')->where('user_id',  $id)->delete();
                if(is_array($groups)){
                    foreach($groups as $gid){
                        DB::table('x_groups_users')->insert(['user_id' => $id, 'group_id' => $gid]);
                    }
                } else {
                    DB::table('x_groups_users')->insert(['user_id' => $id, 'group_id' => $groups]);
                }

            }

            return Redirect::back()->with('message','Operation Successful !');

        }
        return view('admin/users-edit', $data);
    }

    public function groups(){

        $groups = UserGroups::all();
        $data = ['groups' => $groups];
        //echo '<pre>'; print_r($groups[0]->name); die();

        return view('admin/user-groups', $data);
    }

    public function groupsAdd(Request $request){

        if(!empty($_POST)){
            $name = $_POST['name'];
            $status = $_POST['status'];

            $validated = $request->validate([
                'name' => 'required|unique:user_groups|max:50',
                'status' => 'required|integer|max:1',
            ]);

            try {
                $group = new UserGroups;
                $group->name = $name;
                $group->status = $status;
                $group->save();
            } catch (\Exception $e) {
                //print_r($e->getMessage()); die();
                return Redirect::back()->with('error','DB Error !');
            }
            return Redirect::back()->with('message','Operation Successful !');

            $data = ['date' => $_POST];
        }
        return view('admin/user-groups-add');
    }

    public function groupsEdit(Request $request){
        $id = $request->id;
        $group = UserGroups::find($id);
        $data = ['group' => $group];

    if(!empty($_POST)){
        $name = trim($_POST['name']);
        $status = $_POST['status'];

        if($group->name == $name){
            $validated = $request->validate([
                'status' => 'required|integer|max:1',
            ]);
        } else {
            $validated = $request->validate([
                'name' => 'required|unique:user_groups|max:50',
                'status' => 'required|integer|max:1',
            ]);
        }

        try {
            $group->name = $name;
            $group->status = $status;
            $group->save();
        } catch (\Exception $e) {
            //print_r($e->getMessage()); die();
            return Redirect::back()->with('error','DB Error !');
        }
        return Redirect::back()->with('message','Operation Successful !');

        //$data = ['date' => $_POST];
    }
    return view('admin/user-groups-edit', $data);
}

    public function rights(){

        $groups = UserGroups::all();
        $data = ['groups' => $groups];
        //echo '<pre>'; print_r($groups[0]->name); die();

        return view('admin/groups-rights', $data);
    }
}
