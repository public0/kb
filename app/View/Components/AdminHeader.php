<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AdminHeader extends Component
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
        $authUser = Auth::user();
        $data = [
            'current_user_name' => $authUser->full_name,
            'current_user_email' => $authUser->email
        ];

        return view('components.admin-header', $data);
    }
}
