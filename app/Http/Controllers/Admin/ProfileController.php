<?php

namespace App\Http\Controllers\Admin;

use App\Actions\PasswordReseter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    use PasswordReseter;

    public function index(Request $request)
    {
        $id = Auth::id();
        $authUser = Auth::user();
        if ($request->isMethod('post')) {
            // Change profile photo form
            if ($request->has('ChangePhoto')) {
                $image = $request->file('image');
                $name = $id . '.' . $image->extension();
                $image->storeAs($authUser->users_directory, $name);

                try {
                    User::find($id)->update(['image' => $name]);
                } catch (Exception $e) {
                    return redirect()->back()
                        ->with('error', $e->getMessage());
                }

                return redirect()->back()->with('message', 'Image set successfully!');
            }
            // Change password form
            if ($request->has('ChangePassword')) {
                $oldpass = $request->input('CurrentPassword');
                $pass = $request->input('Password');
                $repass = $request->input('RetypePassword');
                $passRegex = '/^\S*(?=\S{10,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/i';
                $validated = $request->validate([
                    'CurrentPassword' => 'required|regex:' . $passRegex,
                    'Password' => 'required|required_with:RetypePassword|regex:' . $passRegex . '|same:RetypePassword',
                    'RetypePassword' => 'required|regex:' . $passRegex
                ]);

                if ($this->prCheckHash($oldpass, $authUser->password)) {
                    try {
                        User::find($id)->update(['password' => $this->prGenerateHash($pass)]);
                    } catch (Exception $e) {
                        return redirect()->back()
                            ->with('error', $e->getMessage());
                    }
                } else {
                    return redirect()->back()->with('error', 'Invalid current password!');
                }

                return redirect()->back()->with('message', 'Operation Successful !');
            }
        }

        return view('admin/profile', [
            'user' => $authUser
        ]);
    }

    public function deleteImage()
    {
        $id = Auth::id();
        $authUser = Auth::user();

        try {
            User::find($id)->update(['image' => null]);
            Storage::delete($authUser->users_directory . DIRECTORY_SEPARATOR . $authUser->image);

            return redirect()->back()
                ->with('message', 'Profile photo was deleted!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}
