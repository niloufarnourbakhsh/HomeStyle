<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::query()->get();
        return view('admin.users.index')->with('users', $users);
    }
}
