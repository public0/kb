<?php

namespace App\Actions;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

trait PasswordReseter
{
    /**
     * @var string
     */
    private $table = 'dbo.password_resets';

    /**
     * Generate hash from string
     *
     * @param string $string
     * @return string
     */
    protected function prGenerateHash($string)
    {
        return Hash::make($string);
    }

    /**
     * Check if token exists for user
     *
     * @param string $token
     * @param User $user
     * @return int
     */
    protected function prCheck($token, $user)
    {
        return DB::table($this->table)
            ->where(['email' => $user->email, 'token' => $token])
            ->count();
    }

    /**
     * Delete token from database for user
     *
     * @param string $token
     * @param User $user
     * @return void
     */
    protected function prDelete($token, $user)
    {
        DB::table($this->table)
            ->where(['email' => $user->email, 'token' => $token])
            ->delete();
    }

    /**
     * Insert token for user
     *
     * @param User $user
     * @return string
     */
    protected function prInsert($user)
    {
        $token = $this->prGenerateHash($user->email);
        DB::table($this->table)
            ->insert([
                'email' => $user->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

        return $token;
    }

    /**
     * Check if token is valid for user
     *
     * @param string $token
     * @param User $user
     * @return bool
     */
    protected function prCompareHash($token, $user)
    {
        return Hash::check($user->email, $token);
    }
}
