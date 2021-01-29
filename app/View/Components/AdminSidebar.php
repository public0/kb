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
        $data = [];
        $data['articles'] = DB::table('article')->count();
        $data['users'] = DB::table('users')->count();
        $data['users_groups'] = DB::table('user_groups')->count();
        $data['newsletter'] = DB::table('Newsletter')->count();
        $data['current_user_name'] = Auth::user()->name;
        return view('components.admin-sidebar', $data);
    }
}
