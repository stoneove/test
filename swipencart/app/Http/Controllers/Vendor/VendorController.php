<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Mail\NewMail;
use App\Models\country;
use App\Models\vendor;
use App\Models\vendors_bank_detail;
use App\Models\vendors_business_detail;
use App\Models\verify_vendor;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Mail;

class VendorController extends Controller
{

    public function index(Request $request)
    {

        return view('vendors.dashboard');

    }


   
    public function vendorlogin(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required|max:255',
            ]);
            if (Auth::guard('vendor')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect('vendor/dashboard');
            } elseif (!Auth::guard('vendor')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect()->back()->with('message', 'Add a correct credientials')->withinput();

            }
        }
        return view('vendors.login');

    }
    public function vendorsignup(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->all();

            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:vendors',
                'password' => [
                    'required',
                    'min:8',
                    // 'regex:/[a-z]/',      // must contain at least one lowercase letter
                    // 'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    // 'regex:/[0-9]/',      // must contain at least one digit
                    // 'regex:/[@$!%*#?&]/', // must contain a special character

                ],
                'confirm_password' => 'required|same:password|min:8',
            ]);

            if ($data['password'] == $data['confirm_password']) {

                $data['password'] = hash::make($data['password']);

                $vendor = vendor::create($data);

                vendors_business_detail::create([
                    'vendor_id' => $vendor['id'],
                ]);
                vendors_bank_detail::create([
                    'vendor_id' => $vendor['id'],
                ]);

                $last_id = $vendor->id;

                $token = $last_id . hash('sha256', \Str::random(120));
                $service = 'Email verification';
                $verifyUrl = route('email_verify', compact('token', 'service'));

                verify_Vendor::create([

                    'vendor_id' => $last_id,
                    'token' => $token,
                ]);

                $mail_data = [
                    'recipient' => $request->email,
                    'fromEmail' => $request->email,
                    'fromName' => $request->name,
                    'subject' => 'Email Verification',
                    'actionLink' => $verifyUrl,
                ];
                MAIL::to($request->email)->send(new NewMail($mail_data));

                if ($vendor) {
                    return redirect()->back()->with('success', 'You need to verify your account. We have sent you an activation link, please check your email');
                } else {
                    return redirect()->back()->with('fail', 'Something went wrong, failed to register');

                }

            } else {
                return redirect()->back()->with('message', 'Password and confirm password not match');
            }

        }

        return view('vendors.signup');

    }

    public function logout()
    {

        Auth::guard('vendor')->logout();
        return redirect(
            'vendor/login'
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
            if (Hash::check($data['currentpassword'], Auth::guard('vendor')->user()->password)) {
                if ($data['newpassword'] == $data['confirmpassword']) {

                    Vendor::where('id', Auth::guard('vendor')->user()->id)->update(['password' => Hash::make($data['newpassword'])]);
                    return redirect()->back()->with('success', 'Password update successfully');
                }

            } else {
                return redirect()->back()->with('message', 'Your current password is Incorrect');
            }
        }

        return view('vendors.updatepassword');

    }

    public function check_current_password(Request $request)
    {
        // through ajax code in custom.js
        $data = $request->all();

        if (Hash::check($data['currentpassword'], Auth::guard('vendor')->user()->password)) {
            return 'true';
        } else {
            return 'false';
        }

    }

    // public function profileupdate(Request $request)
    // {
    //     $request->validate([

    //         'name' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u|max:100',
    //         'mobile' => 'required|max:11',

    //     ]);
    //     $data = $request->all();

    //     Vendor::where('id', Auth::guard('vendor')->user()->id)->update(['name'=>$data['name']],['mobile'=>$data['mobile']]);
    //     return redirect()->back()->with('success_profile','profile update successfully');

    // }
    public function detailupdate(Request $request)
    {
        $countries = Country::where('status', 1)->get();
        $bank_detail = vendors_bank_detail::where('vendor_id', Auth::guard('vendor')->user()->id)->get();
        $business_detail = vendors_business_detail::where('vendor_id', Auth::guard('vendor')->user()->id)->get();

        if ($request->isMethod('post')) {

            $updateProfile = [

                'name' => $request->name,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'pincode' => $request->pincode,
                'mobile' => $request->mobile,
            ];

            $updateBusinessdetail = [

                'shop_name' => $request->shop_name,
                'shop_address' => $request->shop_address,
                'shop_city' => $request->shop_city,
                'shop_state' => $request->shop_state,
                'shop_country' => $request->shop_country,
                'shop_pincode' => $request->shop_pincode,
                'shop_mobile' => $request->shop_mobile,
                'shop_email' => $request->shop_email,
                'business_license_number' => $request->business_license_number,
                'gst_number' => $request->gst_number,
                'pan_number' => $request->gst_number,

            ];
            $updateBankdetail = [

                "account_holder_name" => $request->account_holder_name,
                "bank_name" => $request->bank_name,
                "account_number" => $request->account_number,
                "bank_code" => $request->bank_code,

            ];
            vendor::where('id', Auth::guard('vendor')->user()->id)->update($updateProfile);
            vendors_business_detail::where('vendor_id', Auth::guard('vendor')->user()->id)->update($updateBusinessdetail);
            vendors_bank_detail::where('vendor_id', Auth::guard('vendor')->user()->id)->update($updateBankdetail);
            return redirect()->back();
        }

        return view('vendors.updatedetails', compact('bank_detail', 'business_detail', 'countries'));
    }

    public function email_verify(Request $request)
    {

        $token = $request->token;
        $verifyVendor = verify_vendor::where('token', $token)->first();

        if (!is_null($verifyVendor)) {
            $vendor = $verifyVendor->vendor;
            if (!$vendor->email_verified) {
                $vendor->email_verified = 1;
                $vendor->save();
                return redirect(
                    'vendor/login'
                )->with('success_verify', 'Your are successfully verified please login yourself for futher procedure.');
            }

        }
    }
}
