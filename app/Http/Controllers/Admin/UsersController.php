<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index(){
        return view('admin/users');
    }

    public function add(){
        return view('admin/users-add');
    }

    public function edit(){
        return view('admin/users-add');
    }

    public function groups(){
        return view('admin/user-groups');
    }

    public function groupsAdd(){
        return view('admin/user-groups-add');
    }
}
