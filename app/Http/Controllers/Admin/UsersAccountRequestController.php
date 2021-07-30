<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserAccountRequest;

class UsersAccountRequestController extends Controller
{
    public function index()
    {
        $this->authorize('viewPerms', 'AdminUsersAccountRequest');

        return view('admin/users-account-request', [
            'users' => UserAccountRequest::all()
        ]);
    }

    public function delete($id)
    {
        $this->authorize('viewPerms', 'AdminUsersAccountRequest');

        try {
            $account = UserAccountRequest::find($id);
            $name = $account->name;
            $account->delete();

            return redirect()->back()
                ->with('message', 'Accout request of "' . $name . '" was deleted!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}
