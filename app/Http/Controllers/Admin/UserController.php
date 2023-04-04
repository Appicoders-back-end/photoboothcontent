<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', User::ROLE_CUSTOMER)->get();
        $data = [
            'users' => $users
        ];
        return view('admin.users.index', $data);
    }
}
