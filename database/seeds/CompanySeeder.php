<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
        {
            $companies = DB::connection('mysql_main')->table('companies')->get();
            foreach ($companies as $company) {
                DB::connection('mysql_local')->table('companies')->insert([
                    'id' => $company->id,
                    'user_id' => $company->user_id,
                    'bin'=> $company->bin,
                    'name'=>$company->name,
                    'code'=>$company->code,
                    'phone'=>$company->phone,
                    'description'=>$company->description,
                    'city_id' => $company->city_id,
                    'active' => 1
                ]);
            }

            // $companies = DB::connection('mysql_local')->table('companies')->get();
            // foreach ($companies as $company) {
            //     DB::connection('mysql_main')->table('companies')->insert([
            //         'id' => $company->id,
            //         'bin'=> $company->bin,
            //         'name'=>$company->name,
            //         'code'=>$company->code,
            //         'phone'=>$company->phone,
            //         'description'=>$company->description
            //     ]);
            // }
        }
}