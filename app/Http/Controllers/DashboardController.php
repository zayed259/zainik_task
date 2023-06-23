<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Share;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->guard('admin')->check()) {

            $customers = Customer::all();
            // dd($customers);

            return view('admin.dashboard')->with(compact('customers'));
        } elseif (auth()->guard('customer')->check()) {
            $customer = auth()->guard('customer')->user();

            $data = [
                'name' => $customer->name,
                'email' => $customer->email,
                'details' => $customer->details,
                'avatar' => $customer->avatar,
            ];
            // dd($data);

            $share_buttons = Share::page(
                url('/user_data/' . $customer->id),
                $data['details'],
            )->facebook()->twitter()->linkedin()->whatsapp()->pinterest()->reddit()->telegram();
            // dd($share_buttons);
            return view('customer.dashboard')->with(compact('data', 'share_buttons'));
        } else {
            return redirect()->route('login');
        }
    }

    public function customerEdit($id)
    {
        $customer = Customer::find($id);
        return view('admin.customer.edit')->with(compact('customer'));
    }

    public function customerUpdate(Request $request)
    {
        $request->validate([
            'is_disabled' => 'required',
        ]);

        $customer = Customer::find($request->id);
        $customer->is_disabled = $request->is_disabled;
        $customer = $customer->save();
        if ($customer) {
            return redirect()->route('admin.dashboard')->with('success', 'Customer status updated successfully');
        } else {
            return redirect()->route('admin.customer.edit', $request->id)->with('error', 'Something went wrong');
        }
    }

    public function customerDelete($id)
    {
        $customer = Customer::findOrFail($id);

        $image_path = public_path("avatars/{$customer->avatar}");
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $customer = $customer->delete();
        if ($customer) {
            return redirect()->route('admin.dashboard')->with('success', 'Customer deleted successfully');
        } else {
            return redirect()->route('admin.dashboard')->with('error', 'Something went wrong');
        }
    }
}
