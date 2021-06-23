<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        $this->call(RoleSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(MeasureSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(WeekdaySeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(PageSeeder::class);
        $this->call(ConfigSeeder::class);

        // $this->call(MainRoleSeeder::class);
        // $this->call(MainCountrySeeder::class);
        // $this->call(MainBrandSeeder::class);
        // $this->call(MainUserSeeder::class);
        // $this->call(MainCategorySeeder::class);
        // $this->call(MainMeasureSeeder::class);
        // $this->call(MainCompanySeeder::class);
        // $this->call(MainWeekdaySeeder::class);
        // $this->call(MainStatusSeeder::class);
        // $this->call(MainProductSeeder::class);
        // $this->call(MainGallerySeeder::class);
        // $this->call(MainCitySeeder::class);
        // $this->call(MainPageSeeder::class);
        // $this->call(MainConfigSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
