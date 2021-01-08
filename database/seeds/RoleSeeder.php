<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create(['name'=>'user']);
        Role::create(['name'=>'seller']);
        Role::create(['name'=>'packer']);
        Role::create(['name'=>'delivery']);
        Role::create(['name'=>'admin']);
    }
}
