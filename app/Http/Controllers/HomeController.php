<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function destroy(Request $request): RedirectResponse
    {
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }elseif(Auth::guard('customer')->check()){
            Auth::guard('customer')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }else{
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        return redirect()->route('home');
    }

    public function user_data($id)
    {
        $customer = Customer::findOrfail($id);
        // dd($customer);
        if(!$customer){
            return response()->json([
                'status' => 'error',
                'message' => 'Customer not found',
            ], 404);
        }
        $data = [
            'name' => $customer->name,
            'email' => $customer->email,
            'details' => $customer->details,
            'avatar' => $customer->avatar,
        ];

        return view('customer.user_data')->with(compact('data'));
    }
}
