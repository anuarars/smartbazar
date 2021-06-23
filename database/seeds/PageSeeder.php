<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = DB::connection('mysql_main')->table('pages')->get();
        foreach ($pages as $page) {
            DB::connection('mysql_local')->table('pages')->insert([
                'id' => $page->id,
                'title' => $page->title,
                'body' => $page->body,
                'position' => $page->position,
                'active' => $page->active,
                'slug' => $page->slug,
                'created_at' => $page->created_at,
                'updated_at' => $page->updated_at
            ]);
        }
    }
}
