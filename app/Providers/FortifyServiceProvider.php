<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*if (request()->is('admin/*')) {
            config(['fortify.guard' => 'admin']);
        }*/
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::loginView(function () {
           //return view('auth.login');
        //   return view('frontauth.login');
        });
        Fortify::requestPasswordResetLinkView(function () {
            //return view('auth.passwords.email');
            return view('frontauth.passwords.email');            //formular cerere reset
        });
        Fortify::resetPasswordView(function ($request) {
            //return view('auth.passwords.reset', ['request' => $request]);
           return view('frontauth.passwords.reset', ['request' => $request]);  //formular schimbare parola
        });

        Fortify::verifyEmailView(function () {
      //      return view('auth.verify');
        });

        Fortify::authenticateUsing(function (Request $request) {
            $groupsArray = null;
            $user = User::where('email', $request->email)->where('status','1')->first();

            if($user){
                $groups = DB::table('x_groups_users')->leftJoin('user_groups','x_groups_users.group_id','=','user_groups.id')->where('user_id', $user->id)->select('group_id')->get();
                if($groups){
                    foreach ($groups as $gr){
                        $groupsArray[] = $gr->group_id;
                    }
                }
            }
            if ($user && Hash::check($request->password, $user->password)) {
                if(!empty($groupsArray) && in_array(1, $groupsArray)){
                    return $user;
                }
            }
        });
    }
}
