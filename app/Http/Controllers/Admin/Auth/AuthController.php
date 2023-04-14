<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Requests\Admin\UpdatePassword\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController
{
    public function login()
    {
        if (auth()->guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    public function doLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages())->withInput();
        }

        if (!Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => User::ROLE_ADMIN])) {
            return redirect()->back()->withInput()->with('error', __('Invalid username or password'));
        }

        Auth::guard('admin')->loginUsingId(auth()->guard('admin')->user()->id);
        return redirect()->route('admin.users.index');
    }

    public function changePassword()
    {
        return view('admin.ChangePassword.change-password');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        try {

            $user = User::find(auth()->user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('admin.change_password')->with('success', __('Password has been updated successfully!'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.change_password')->with('error', $exception->getMessage());
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
