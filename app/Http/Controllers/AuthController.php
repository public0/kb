<?php

namespace App\Http\Controllers;

use App\Actions\PasswordReseter;
use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use PasswordReseter;
    use PasswordValidationRules;

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::check()) {
            return redirect()->back();
        }

        if (!empty($_POST)) {
            if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1])) {
                $request->session()->regenerate();

                return redirect($request->query('redirect') ?? '/');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        return view('auth.login');
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect('/');
    }

    public function passwordReset(Request $request)
    {
        if ($request->isMethod('post')) {
            $token = $request->input('token');
            $email = $request->input('email');
            $password = $request->input('password');

            $validated = $request->validate([
                'token' => 'required',
                'email' => 'required|email:rfc,dns|max:255',
                'password' => $this->passwordRules()
            ]);

            try {
                $user = User::active()->where('email', $email)->first();
                if ($user && $this->prCheck($token, $user)) {
                    $user->forceFill([
                        'password' => $this->prGenerateHash($password)
                    ])->save();
                    $this->prDelete($token, $user);

                    return redirect()->route('auth.login');
                } else {
                    return redirect()->back()->withErrors([
                        'email' => 'Your password has already been reset'
                    ]);
                }
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('auth.password-reset');
    }
}
