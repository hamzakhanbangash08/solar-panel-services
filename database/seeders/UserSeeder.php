<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Clear cached permissions
        app()['cache']->forget('spatie.permission.cache');

        // Define permissions
        $permissions = [
            'view dashboard',
            'manage users',
            'manage services',
            'view bookings',
            'create bookings',
            'update status',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        $techRole = Role::firstOrCreate(['name' => 'technician']);
        $techRole->givePermissionTo(['view dashboard', 'view bookings', 'update status']);

        $customerRole = Role::firstOrCreate(['name' => 'customer']);
        $customerRole->givePermissionTo(['create bookings', 'view bookings']);

        $salesRole = Role::firstOrCreate(['name' => 'sales']);
        $salesRole->givePermissionTo(['view dashboard', 'view bookings', 'manage services']);

        // Create Admin User
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@solar.com',
            'password' => Hash::make('admin123')
        ]);
        $admin->assignRole('admin');

        // Technician
        $tech = User::create([
            'name' => 'Solar Technician',
            'email' => 'technician@solar.com',
            'password' => Hash::make('tech123')
        ]);
        $tech->assignRole('technician');

        // Customer
        $customer = User::create([
            'name' => 'Test Customer',
            'email' => 'customer@solar.com',
            'password' => Hash::make('customer123')
        ]);
        $customer->assignRole('customer');

        // Sales
        $sales = User::create([
            'name' => 'Sales Manager',
            'email' => 'sales@solar.com',
            'password' => Hash::make('sales123')
        ]);
        $sales->assignRole('sales');
    }
}
