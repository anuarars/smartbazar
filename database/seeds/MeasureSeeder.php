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
        DB::table('measures')->truncate();

        $measures = [
            ['title' => 'Килограммы', 'code' => 'Кг'],
            ['title' => 'Граммы', 'code' => 'Гр'],
            ['title' => 'Метры', 'code' => 'Мт'],
            ['title' => 'Литры', 'code' => 'Лтр'],
            ['title' => 'Количество', 'code' => 'Шт'],
        ];

        DB::table('measures')->insert($measures);
    }
}
