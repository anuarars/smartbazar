<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = DB::connection('mysql_local')->table('users')->get();
        foreach ($users as $user) {
            DB::connection('mysql_main')->table('users')->insert([
                'id' => $user->id,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'phone' => $user->phone,
                'password' => $user->password,
                'phone_verify_code' => $user->phone_verify_code,
                'phone_verified_at' => $user->phone_verified_at
            ]);
        }

        $items = DB::connection('mysql_local')->table('role_user')->get();
        foreach ($items as $item) {
            DB::connection('mysql_main')->table('role_user')->insert([
                'id' => $item->id,
                'role_id' => $item->role_id,
                'user_id' => $item->user_id,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at
            ]);
        }
    }
}
