<?php

namespace App\Http\Controllers;

use App\Actions\PasswordReseter;
use App\Actions\Fortify\PasswordValidationRules;
use App\Mail\AccountRequestMail;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserAccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        if ($request->isMethod('post')) {
            if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1])) {
                $request->session()->regenerate();

                return redirect($request->query('redirect') ?? '/');
            }

            return back()->withErrors([
                'email' => __('auth.failed')
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
                        'email' => __('auth.already_reset')
                    ]);
                }
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('auth.password-reset');
    }

    public function accountRequest(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email:rfc,dns|max:255',
                'phone' => 'required|max:255',
                'company' => 'required|max:255',
                'position' => 'required|max:255'
            ]);

            $fields = $request->only(['name', 'email', 'phone', 'company', 'position']);
            $account = UserAccountRequest::where('email', $fields['email']);
            if ($account->first()) {
                $account->update($fields);
            } else {
                UserAccountRequest::create($fields);
            }
            Mail::to(Setting::byKey('AccountRequestEmail'))
                ->send(new AccountRequestMail($fields));

            return redirect()->route('auth.login')
                ->with('message', __('auth.msg_account_requested'));
        }

        return view('auth.account-request');
    }
}
