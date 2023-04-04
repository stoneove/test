<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminPassReset;
use App\Models\Admin;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class AdminController extends Controller
{
    public function index()
    {

        return view('admins.dashboard');

    }
    public function passwordreset(Request $request)
    {

        if ($request->isMethod('post')) {
            $email = [
                'email' => $request->email,
            ];

            $compareEmail = Admin::where('email', $email)->first();

            $sender_id = $compareEmail->id;
            $sender_email = $compareEmail->email;
            $sender_name = $compareEmail->name;

            if ($sender_email == $email['email']) {

                $token = $sender_id . hash('sha256', \Str::random(120));
                $service = 'Email verification';
                $verifyUrl = route('reset_password', compact('token', 'service'));

                Admin::where('id', $sender_id)->update(['token' => $token]);
                $mail_data = [
                    'email' => $request->email,
                    'name' => $sender_name,

                    'subject' => 'Password Updates',
                    'actionLink' => $verifyUrl,
                ];
                MAIL::to($request->email)->send(new AdminPassReset($mail_data));

                return redirect()->back()->with('success', 'Please check your email to reset your password');
            } else {
                return redirect()->back()->with('error', 'Please enter your correct mail');
            }
        }
        return view('admins.passwordreset');
    }

    public function reset_password(Request $request, $token = null)
    {
        $admin_data = Admin::where('token', $token)->first();

        return view('admins.resetpassword')->with(['admin_data' => $admin_data]);

    }
    public function reset_update_password(Request $request)
    {
        $data = $request->all();
        // dd($data['token']);
        // $request->validate([
        //     'email'=>'required|email|exists:admin,email',
        //     'password'=>'required|min:5|confirmed',
        //     'cpassword'=>'required',
        // ]);

        $check_token = DB::table('admins')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if (!$check_token) {

            return back()->withInput()->with('fail', 'Invalid token');
        } else {

            admin::where('email', $request->email)->update([
                'password' => \Hash::make($request->password),
            ]);

            Admin::where('token', $request->token)->update(['token' => null]);

            return redirect('admin/login')->with('info', 'Your password has been changed! You can login with new password')->with('verifiedEmail', $request->email);
        }

    }

    public function adminlogin(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required|max:255',
            ]);
            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1])) {
                return redirect('admin/dashboard');
            } elseif (!Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1])) {
                return redirect()->back()->with('message', 'The user not is available you have to signup first...');
            }
        }
        return view('admins.login');

    }
    public function adminlogout()
    {

        Auth::guard('admin')->logout();
        return redirect(
            'admin/login'
        );
    }

    public function passwordupdate(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $request->validate([

                'currentpassword' => 'required|max:255',
                'newpassword' => 'required|max:255',
                'confirmpassword' => 'required|same:newpassword',
            ]);
            if (Hash::check($data['currentpassword'], Auth::guard('admin')->user()->password)) {
                if ($data['newpassword'] == $data['confirmpassword']) {

                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => Hash::make($data['newpassword'])]);
                    return redirect()->back()->with('success', 'Password update successfully');
                }

            } else {
                return redirect()->back()->with('message', 'Your current password is Incorrect');
            }
        }
        return view('admins.updatepassword');

    }

    public function check_current_password(Request $request)
    {
        // through ajax code in custom.js
        $data = $request->all();
        if (Hash::check($data['currentpassword'], Auth::guard('admin')->user()->password)) {
            return 'true';
        } else {
            return 'false';
        }

    }
    public function profileupdate(Request $request)
    {
        $request->validate([

            'name' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u|max:100',
            'mobile' => 'required|max:11',

        ]);
        $data = $request->all();
        $id = Admin::where('id', Auth::guard('admin')->user()->id)->update(['name' => $request['name']], ['mobile' => $request['mobile']]);
        return redirect()->back()->with('success_profile', 'profile update successfully');

    }
    public function detailupdate(Request $request)
    {
        return view('admins.updatedetails');
    }

}
