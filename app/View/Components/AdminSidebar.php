<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminSidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $data = [
            'users' => DB::table('users')->count(),
            'users_groups' => DB::table('user_groups')->count(),
            'articles' => DB::table('article')->count(),
            'categories' => DB::table('categories')->count(),
            'subscribers' => DB::table('newsletter')->count(),
            'current_user_name' => Auth::user()->full_name
        ];

        return view('components.admin-sidebar', $data);
    }
}
