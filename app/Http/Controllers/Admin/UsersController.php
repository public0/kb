<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Countries;
use App\Actions\PasswordReseter;
use App\Http\Controllers\Controller;
use App\Mail\UserAccountMail;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    use Countries;
    use PasswordReseter;

    /**
     * Get available roles for logged user
     *
     * @return array
     */
    private function getAvailableRoles()
    {
        $authUser = Auth::user();
        $roles = $authUser->roles;
        if ($authUser->client_id) {
            foreach (array_keys($roles) as $role) {
                if ($role == 0) {
                    continue;
                }
                if ($authUser->role == $role) {
                    break;
                } else {
                    unset($roles[$role]);
                }
            }
        }

        return $roles;
    }

    public function index(Request $request)
    {
        $this->authorize('userPerms', 'index');

        $users = User::with('client');
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
        $clientID = Auth::user()->client_id;
        if ($clientID) {
            $users->where('client_id', $clientID);
        }
        $users = $users->get();

        return view('admin/users', [
            'users' => $users,
            'roles' => $this->getAvailableRoles(),
            'countries' => $this->getAllCountries(),
            'filters' => $filters
        ]);
    }

    public function status($id)
    {
        $user = User::find($id);
        $this->authorize('userPerms', ['status', $user]);

        try {
            $user->status = 1 - $user->status;
            $user->save();

            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function add(Request $request)
    {
        $authUser = Auth::user();
        $this->authorize('userPerms', 'add');

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
                $user->client_id = $request->input('client_id', $authUser->client_id);
                $user->save();

                if ($request->input('notify-user')) {
                    $token = $this->prInsert($user);
                    $fields = [
                        'name' => $name,
                        'surname' => $surname,
                        'email' => $email,
                        'password_link' => route('auth.password.reset', ['token' => $token])
                    ];
                    Mail::to($email)
                        ->send(new UserAccountMail($fields));
                }
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }

            return redirect('/admin/users')->with('message', 'Operation Successful !');
        }

        return view('admin/users-form', [
            'user' => null,
            'roles' => $this->getAvailableRoles(),
            'countries' => $this->getAllCountries(),
            'clients' => Client::active()->get(),
            'auth_user' => $authUser
        ]);
    }

    public function edit(Request $request, $id)
    {
        $authUser = Auth::user();
        $user = User::find($id);
        $this->authorize('userPerms', ['edit', $user]);

        if ($request->isMethod('post')) {
            $name = trim($request->input('name'));
            $surname = trim($request->input('surname'));
            $email = trim($request->input('email'));
            $role = $request->input('role');
            $country_code = $request->input('country_code');
            $status = $request->input('status');
            $permissions = $request->input('perms');

            if ($email != $user->email) {
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

            $user = User::find($id);
            $user->name = $name;
            $user->surname = $surname;
            $user->role = $role;
            $user->permissions = $permissions ? json_encode(array_keys($permissions)) : null;
            $user->country_code = $country_code;
            $user->email = $email;
            $user->status = $status;
            $user->client_id = $request->input('client_id', $authUser->client_id);
            $user->save();

            if ($request->input('notify-user')) {
                $token = $this->prInsert($user);
                $fields = [
                    'name' => $name,
                    'surname' => $surname,
                    'email' => $email,
                    'password_link' => route('auth.password.reset', ['token' => $token])
                ];
                Mail::to($email)
                    ->send(new UserAccountMail($fields));
            }

            return redirect('/admin/users')->with('message', 'Operation Successful !');
        }

        return view('admin/users-form', [
            'user' => $user,
            'roles' => $this->getAvailableRoles(),
            'countries' => $this->getAllCountries(),
            'clients' => Client::active()->get(),
            'auth_user' => $authUser
        ]);
    }

    public function passwordReset(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $this->authorize('userPerms', ['passwordReset', $user]);
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

    public function rolePasswordReset(Request $request)
    {
        if ($request->isMethod('post')) {
            $role = $request->input('role');
            if ($role !== null) {
                $users = User::active()->where('role', $role)->get();
                $processed = 0;
                foreach ($users as $user) {
                    $token = $this->prInsert($user);
                    $fields = [
                        'name' => $user->name,
                        'surname' => $user->surname,
                        'email' => $user->email,
                        'password_link' => route('auth.password.reset', ['token' => $token])
                    ];
                    Mail::to($user->email)
                        ->send(new UserAccountMail($fields));
                    $processed += 1;
                }
                echo $processed;
            }
        }
    }
}
