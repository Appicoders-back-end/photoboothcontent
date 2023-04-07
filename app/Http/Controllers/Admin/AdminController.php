<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function settings()
    {
        $logo = get_option('logo') != null ? url('/') . '/' . get_option('logo') : null;
        $data = [
            'logo' => $logo,
        ];
        return view('admin.settings', $data);
    }

    public function storeSettings(Request $request)
    {
        try {
            if ($request->logo) {
                $fileName = saveFile($request->logo, "logo");
                update_option('logo', $fileName);
            }
            return redirect()->back()->with('success', __('Settings has been updated successfully'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
