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
            'firstname' => 'user',
            'lastname' => 'user',
            'phone' => '+7 (222) 222 2222',
            'company_id' => '1',
            'password' => Hash::make('11111111')
        ]);

        $seller = User::create([
            'firstname' => 'seller',
            'lastname' => 'seller',
            'phone' => '+7 (111) 111 1111',
            'company_id' => '1',
            'password' => Hash::make('11111111')
        ]);

        $packer = User::create([
            'firstname' => 'packer',
            'lastname' => 'seller',
            'phone' => '+7 (333) 333 3333',
            'password' => Hash::make('11111111')
        ]);

        $delivery = User::create([
            'firstname' => 'delivery',
            'lastname' => 'seller',
            'phone' => '+7 (444) 444 4444',
            'password' => Hash::make('11111111')
        ]);

        $admin = User::create([
            'firstname' => 'admin',
            'lastname' => 'seller',
            'phone' => '+7 (555) 555 5555',
            'password' => Hash::make('11111111')
        ]);

        $user->roles()->attach($userRole);
        $seller->roles()->attach($sellerRole);
        $packer->roles()->attach($packerRole);
        $delivery->roles()->attach($deliveryRole);
        $admin->roles()->attach($adminRole);
    }
}
