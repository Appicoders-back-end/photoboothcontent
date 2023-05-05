<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
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

    public function inquires(){
        $inquiries = Inquiry::orderBy("id","desc")->get();
        return view('admin.inquiries.index',compact('inquiries'));
    }

    public function inquiresDelete ($id){
        try {
            $inquiry = Inquiry::find($id);
            $res = $inquiry->delete();
            if ($res) {
                return back()->with('success', 'Inquiry has been successfully deleted .');
            }
        } catch (\Exception $exception) {
            return redirect()->route('admin.inquires')->with('error', $exception->getMessage());
        }
    }
}
