<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\vendor;
use Illuminate\Http\Request;

class AdminController2 extends Controller
{
    public function vendor_approve(Request $request)
    {

        if ($request->isMethod('post')) {
            $id = $request['id'];
            $ids = vendor::find($id);

            if ($ids['status'] == 1) {

                $ids->status = 0; // set status to 1
                $ids->save();
                return redirect('admin/vendor_approve');
            } elseif ($ids['status'] == 0) {

                $ids->status = 1; // set status to 1
                $ids->save();
                return redirect('admin/vendor_approve');

            }
        }

        $vendors = Vendor::whereNotNull('vendors.id')
        // ->whereNotNull('vendors.name')
            ->join('vendors_business_details', 'vendors.id', '=', 'vendors_business_details.vendor_id')
            ->join('vendors_bank_details', 'vendors.id', '=', 'vendors_bank_details.vendor_id')
            ->get();

        $myData = [];

        foreach ($vendors as $item) {
            $myData[] = [
// vendor data
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
                'address' => $item->address,
                'city' => $item->city,
                'state' => $item->state,
                'country' => $item->country,
                'pincode' => $item->pincode,
                'mobile' => $item->mobile,
                'status' => $item->status,
                'terminate' => $item->terminate,

// vendor end
// bank data

// bank data
                'account_holder_name' => $item->account_holder_name,
                'account_number' => $item->account_number,
                'bank_code' => $item->bank_code,
                'bank_name' => $item->bank_name,
// bank data end
// business data
                'shop_name' => $item->shop_name,
                'shop_city' => $item->shop_name,
                'shop_state' => $item->shop_state,
                'shop_country' => $item->shop_country,
                'shop_pincode' => $item->shop_pincode,
                'shop_email' => $item->shop_email,
                'gst_number' => $item->gst_number,
                'pan_number' => $item->pan_number,
                'shop_address' => $item->shop_address,
                'shop_mobile' => $item->shop_mobile,
                'address_proff' => $item->address_proff,
                'business_license_number' => $item->business_license_number,
// business data end
            ];
        }
        return view('admins.vendor_approve', compact('myData'));
    }

    public function vendor_pending()
    {

        $vendors = Vendor::whereNotNull('vendors.id')
        // ->whereNotNull('vendors.name')
            ->join('vendors_business_details', 'vendors.id', '=', 'vendors_business_details.vendor_id')
            ->join('vendors_bank_details', 'vendors.id', '=', 'vendors_bank_details.vendor_id')
            ->get();

        $myData = [];

        foreach ($vendors as $item) {
            $myData[] = [
// vendor data
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
                'mobile' => $item->mobile,
                'city' => $item->city,
                'state' => $item->state,
                'country' => $item->country,
                'address' => $item->address,
                'pincode' => $item->pincode,
                'status' => $item->status,
                'terminate' => $item->terminate,

// vendor end
// bank data

// bank data
                'account_holder_name' => $item->account_holder_name,
                'account_number' => $item->account_number,
                'bank_code' => $item->bank_code,
                'bank_name' => $item->bank_name,
// bank data end
// business data
                'shop_name' => $item->shop_name,
                'shop_address' => $item->shop_address,
                'shop_mobile' => $item->shop_mobile,
                'business_license_number' => $item->business_license_number,
                'gst_number' => $item->gst_number,
                'pan_number' => $item->pan_number,

// business data end
            ];
        }
        return view('admins.vendor_pending', compact('myData'));

    }
    public function terminate(Request $request)
    {
        $id = $request['id'];
        $ids = vendor::findorfail($id);

        if ($ids['terminate'] == 1) {

            $ids->terminate = 0; // set status to 1
            $ids->save();
            return redirect('admin/vendor_approve');
        } elseif ($ids['terminate'] == 0) {

            $ids->terminate = 1; // set status to 1
            $ids->save();
            return redirect('admin/vendor_approve');

        }
    }

    public function sections(Request $request)
    {

        return view('admins.products.sections');
    }
}
