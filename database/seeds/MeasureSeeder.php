<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeasureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $measures = DB::connection('mysql_main')->table('measures')->get();
        foreach ($measures as $measure) {
            DB::connection('mysql_local')->table('measures')->insert([
                'id' => $measure->id,
                'title' => $measure->title,
                'code' => $measure->code
            ]);
        }

        // $measures = DB::connection('mysql_local')->table('measures')->get();
        // foreach ($measures as $measure) {
        //     DB::connection('mysql_main')->table('measures')->insert([
        //         'id' => $measure->id,
        //         'title' => $measure->title,
        //         'code' => $measure->code
        //     ]);
        // }
    }
}