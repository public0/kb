<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Countries;
use App\Actions\PasswordReseter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class UsersController extends Controller
{
    use Countries;
    use PasswordReseter;

    public function index(Request $request)
    {
        $this->authorize('viewPerms', 'AdminUsers');

        $users = User::select();
        $filters = ['role' => null, 'status' => null, 'country' => null];
        if ($request->isMethod('get')) {
            if ($request->filled('role')) {
                $filters['role'] = $request->input('role');
                $users->where('role', $filters['role']);
            }
            if ($request->filled('country')) {
                $filters['country'] = $request->input('country');
                $users->where('country_code', $filters['country']);
            }
            if ($request->filled('status')) {
                $filters['status'] = $request->input('status');
                $users->where('status', $filters['status']);
            }
        }
        $users = $users->get();

        return view('admin/users', [
            'users' => $users,
            'roles' => (new User)->roles,
            'countries' => $this->getAllCountries(),
            'filters' => $filters
        ]);
    }

    public function status($id)
    {
        $this->authorize('viewPerms', 'AdminUsers');

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
        $this->authorize('viewPerms', 'AdminUsers');

        $data = [
            'user' => null,
            'roles' => (new User)->roles,
            'countries' => $this->getAllCountries()
        ];

        if ($request->isMethod('post')) {
            $name = trim($request->input('name'));
            $surname = trim($request->input('surname'));
            $email = trim($request->input('email'));
            $role = $request->input('role');
            $country_code = $request->input('country_code');
            $status = $request->input('status');
            $permissions = $request->input('perms');

            $validated = $request->validate([
                'name' => 'required|max:255',
                'surname' => 'required|max:255',
                'email' => 'required|email:rfc,dns|max:255|unique:' . User::class,
                'country_code' => 'required|max:2',
                'role' => 'required|integer',
                'status' => 'required|integer|max:1'
            ]);

            try {
                $user = new User;
                $user->name = $name;
                $user->surname = $surname;
                $user->email = $email;
                $user->role = $role;
                $user->permissions = $permissions ? json_encode(array_keys($permissions)) : null;
                $user->country_code = $country_code;
                $user->status = $status;
                $user->password = $this->prGenerateHash('xoxoxo34*xox');
                $user->save();
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }

            return redirect('/admin/users')->with('message', 'Operation Successful !');
        }

        return view('admin/users-form', $data);
    }

    public function edit(Request $request)
    {
        $this->authorize('viewPerms', 'AdminUsers');

        $id = $request->id;
        $users = User::where('id', $id)->get();
        $data = [
            'user' => $users[0],
            'roles' => (new User)->roles,
            'countries' => $this->getAllCountries()
        ];

        if ($request->isMethod('post')) {
            $name = trim($request->input('name'));
            $surname = trim($request->input('surname'));
            $email = trim($request->input('email'));
            $role = $request->input('role');
            $country_code = $request->input('country_code');
            $status = $request->input('status');
            $permissions = $request->input('perms');

            if ($email != $users[0]->email) {
                $validated = $request->validate([
                    'name' => 'required|max:255',
                    'surname' => 'required|max:255',
                    'email' => 'required|email:rfc,dns|max:255|unique:' . User::class,
                    'country_code' => 'required|max:2',
                    'role' => 'required|integer',
                    'status' => 'required|integer|max:1'
                ]);
            } else {
                $validated = $request->validate([
                    'name' => 'required|max:255',
                    'surname' => 'required|max:255',
                    'country_code' => 'required|max:2',
                    'role' => 'required|integer',
                    'status' => 'required|integer|max:1'
                ]);
            }

            User::where('id', $id)->update([
                'name' => $name,
                'surname' => $surname,
                'role' => $role,
                'permissions' => $permissions ? json_encode(array_keys($permissions)) : null,
                'country_code' => $country_code,
                'email' => $email,
                'status' => $status
            ]);

            return redirect('/admin/users')->with('message', 'Operation Successful !');
        }

        return view('admin/users-form', $data);
    }

    public function passwordReset(Request $request, $id)
    {
        $this->authorize('viewPerms', 'AdminUsers');

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
}
