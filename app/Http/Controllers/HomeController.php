<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function user_data($id)
    {
        $customer = Customer::findOrfail($id);
        // dd($customer);
        if (!$customer) {
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
