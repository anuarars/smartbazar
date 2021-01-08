<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $userRole = Role::where('name', 'user')->first();
        $sellerRole = Role::where('name', 'seller')->first();
        $packerRole = Role::where('name', 'packer')->first();
        $deliveryRole = Role::where('name', 'delivery')->first();
        $adminRole = Role::where('name', 'admin')->first();

        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'company_id' => '1',
            'password' => Hash::make('12345678')
        ]);

        $seller = User::create([
            'name' => 'seller',
            'email' => 'seller@seller.com',
            'password' => Hash::make('12345678')
        ]);

        $packer = User::create([
            'name' => 'packer',
            'email' => 'packer@packer.com',
            'password' => Hash::make('12345678')
        ]);

        $delivery = User::create([
            'name' => 'delivery',
            'email' => 'delivery@delivery.com',
            'password' => Hash::make('12345678')
        ]);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678')
        ]);

        $user->roles()->attach($userRole);
        $seller->roles()->attach($sellerRole);
        $packer->roles()->attach($packerRole);
        $delivery->roles()->attach($deliveryRole);
        $admin->roles()->attach($adminRole);
    }
}
