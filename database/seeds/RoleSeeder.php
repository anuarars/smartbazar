<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = DB::connection('mysql_main')->table('roles')->get();
        foreach ($roles as $role) {
            DB::connection('mysql_local')->table('roles')->insert([
                'id' => $role->id,
                'name'=> $role->name
            ]);
        }
    }
}
