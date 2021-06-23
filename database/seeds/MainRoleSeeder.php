<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = DB::connection('mysql_local')->table('roles')->get();
        foreach ($roles as $role) {
            DB::connection('mysql_main')->table('roles')->insert([
                'id' => $role->id,
                'name'=> $role->name
            ]);
        }
    }
}
