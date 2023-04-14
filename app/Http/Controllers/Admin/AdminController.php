<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function Symfony\Component\Mime\Header\all;

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
            'contact' => get_option('contact'),
            'email' => get_option('email'),
            'address' =>  get_option('address'),
            'footer_description' => get_option('footer_description'),
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
            update_option('contact', $request->contact);
            update_option('email', $request->email);
            update_option('address', $request->address);
            update_option('footer_description', $request->footer_description);

            return redirect()->back()->with('success', __('Settings has been updated successfully'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
