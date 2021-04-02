<?php

namespace App\Http\Controllers\Admin;

use App\Actions\PasswordReseter;
use App\Http\Controllers\Controller;
use App\Mail\PasswordMail;
use App\Models\GroupsUsers;
use App\Models\User;
use App\Models\UserGroups;
use App\MyClasses\UtileClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class UsersController extends Controller
{
    use PasswordReseter;

    public function index()
    {
        $users = User::with([
            'groups' => function ($query) {
                return $query->with('group');
            }
        ])->get();
        foreach ($users as $user) {
            $groups = [];
            foreach ($user->groups as $group) {
                $groups[] = !empty($group->group) ? $group->group->name : null;
            }
            $user->groups = implode(', ', $groups);
        }

        $data = ['users'=> $users];

        return view('admin/users', $data);
    }

    public function status($id)
    {
        try {
            $user = User::where('id', $id);
            $data = $user->first();
            $user->update([
                'status' => 1 - $data->status
            ]);

            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function add(Request $request)
    {
        $groups = UserGroups::active()->get();
        $data = ['groups' => $groups];

        if (!empty($_POST)) {
            $name = trim($_POST['name']);
            $surname = trim($_POST['surname']);
            $email = trim($_POST['email']);
            $status = $_POST['status'];
            //$password = $_POST['password'];

            $validated = $request->validate([
                'name' => 'required|max:255',
                'surname' => 'required|max:255',
                'email' => 'required|email:rfc,dns|max:255|unique:' . User::class,
                'status' => 'required|integer|max:1',
                'groups' => 'required'
            ]);

            try {
                $user = new User;
                $user->name = $name;
                $user->surname = $surname;
                $user->email = $email;
                $user->status = $status;
                $user->password = $this->prGenerateHash('xoxoxo34*xox');
                $user->save();
                $last_id = $user->id;
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }

            $groups = (!empty($_POST['groups'])) ? $_POST['groups'] : null;
            if (!empty($groups) && $groups && $last_id) {
                foreach ($groups as $gid) {
                    try {
                        GroupsUsers::create(['user_id' => $last_id, 'group_id' => $gid]);
                    } catch (Exception $e) {
                        return redirect()->back()
                            ->with('error', $e->getMessage());
                    }
                }
            }

            /*$pass = uniqid();
            $details = [
                'title' => 'Mail from ItSolutionStuff.com',
                'body' => 'Passord is :'.$pass;
            ];

            \Mail::to('gbyte2004@yahoo.com')->send(new \App\Mail\PasswordMail($details));
            die();*/

            return redirect('/admin/users')->with('message', 'Operation Successful !');
        }

        return view('admin/users-add', $data);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $groups = UserGroups::active()->get();
        $users = User::with('groups')->where('id', $id)->get();
        $data = ['users'=> $users[0], 'groups' => $groups];

        if (!empty($_POST)) {
            $name = trim($_POST['name']);
            $surname = trim($_POST['surname']);
            $email = trim($_POST['email']);
            $status = $_POST['status'];

            if ($email != $users[0]->email) {
                $validated = $request->validate([
                    'name' => 'required|max:255',
                    'surname' => 'required|max:255',
                    'email' => 'required|email:rfc,dns|max:255|unique:' . User::class,
                    'status' => 'required|integer|max:1',
                    'groups' => 'required'
                ]);
            } else {
                $validated = $request->validate([
                    'name' => 'required|max:255',
                    'surname' => 'required|max:255',
                    'status' => 'required|integer|max:1',
                    'groups' => 'required'
                ]);
            }

            User::where('id', $id)->update([
                'name' => $name,
                'surname' => $surname,
                'email' => $email,
                'status' => $status
            ]);

            $groups = (!empty($_POST['groups'])) ? $_POST['groups'] : null;
            if (!empty($groups) && $groups && $id) {
                GroupsUsers::where('user_id', $id)->delete();
                if (is_array($groups)) {
                    foreach ($groups as $gid) {
                        GroupsUsers::create(['user_id' => $id, 'group_id' => $gid]);
                    }
                } else {
                    GroupsUsers::create(['user_id' => $id, 'group_id' => $groups]);
                }
            }

            return redirect('/admin/users')->with('message', 'Operation Successful !');
        }

        return view('admin/users-edit', $data);
    }

    public function passwordReset(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $token = null;

        if ($request->isMethod('post')) {
            $token = $this->prInsert($user);
        }

        return response()->json([
            'name' => $user->full_name,
            'email' => $user->email,
            'reset_link' => $token ? route('auth.password.reset', ['token' => $token]) : null
        ]);
    }

    public function groups()
    {
        $groups = UserGroups::all();
        $data = ['groups' => $groups];

        return view('admin/user-groups', $data);
    }

    public function groupAdd(Request $request)
    {
        if (!empty($_POST)) {
            $name = $_POST['name'];
            $status = $_POST['status'];

            $validated = $request->validate([
                'name' => 'required|max:50|unique:' . UserGroups::class,
                'status' => 'required|integer|max:1'
            ]);

            try {
                $group = new UserGroups;
                $group->name = $name;
                $group->status = $status;
                $group->save();
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }

            return redirect('/admin/groups')->with('message', 'Operation Successful !');
        }

        return view('admin/user-groups-add');
    }

    public function groupEdit(Request $request)
    {
        $id = $request->id;
        $group = UserGroups::find($id);
        $data = ['group' => $group];

        if (!empty($_POST)) {
            $name = trim($_POST['name']);
            $status = $_POST['status'];

            if ($group->name == $name) {
                $validated = $request->validate([
                    'status' => 'required|integer|max:1',
                ]);
            } else {
                $validated = $request->validate([
                    'name' => 'required|max:50|unique:' . UserGroups::class,
                    'status' => 'required|integer|max:1'
                ]);
            }

            try {
                $group->name = $name;
                $group->status = $status;
                $group->save();
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }

            return redirect('/admin/groups')->with('message', 'Operation Successful !');
        }

        return view('admin/user-groups-edit', $data);
    }

    public function groupStatus($id)
    {
        try {
            $group = UserGroups::where('id', $id);
            $data = $group->first();
            $group->update([
                'status' => 1 - $data->status
            ]);

            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function groupDelete(Request $request)
    {
        $id = $request->id;
        $group = UserGroups::where('id', $id)->first();
        if ($group->undelete != 1) {
            try {
                $art = UserGroups::where('id', $id);
                $art->delete();

                return redirect('/admin/groups')->with('message', 'Operation Successful !');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('error', 'This record cannot be deleted!');
        }
    }
}
