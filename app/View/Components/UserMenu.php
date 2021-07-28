<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class UserMenu extends Component
{
    public $section;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($section)
    {
        $this->section = $section;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $user = null;

        if (Auth::check()) {
            $user = Auth::user();
        }

        return view('components.user-menu', compact('user'));
    }
}
