<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSubscription;
use Dflydev\DotAccessData\Data;
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

    public function changeStatus(Request $request , $id){
        try {
            $user = User::find($id);

            $user->status = ($request->status == 'inactive')?User::INACTIVE:User::ACTIVE;
            $user->save();
            return redirect()->route('admin.users.index')->with('success', 'User Status has been updated successfully');

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
