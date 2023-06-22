<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::where('email', 'admin@gmail.com')->first();
        if (is_null($admin)) {
            Admin::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
            ]);
        }

        // $customer = Customer::where('email', 'customer@gmail.com')->first();
        // if (is_null($customer)) {
        //     Customer::create([
        //         'name' => 'Customer',
        //         'email' => 'customer@gmail.com',
        //         'password' => Hash::make('customer123'),
        //         'details' => 'Customer Details',
        //         'avatar' => 'https://via.placeholder.com/150',
        //     ]);
        // }

        // $user = User::where('email', 'user@gmail.com')->first();
        // if (is_null($user)) {
        //     User::create([
        //         'name' => 'User',
        //         'email' => 'user@gmail.com',
        //         'password' => Hash::make('user123'),
        //     ]);
        // }
    }
}
