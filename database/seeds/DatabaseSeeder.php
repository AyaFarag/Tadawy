<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountrySeeder::class,
            CitySeeder::class,
            SpecializationSeeder::class,
            PageSeeder::class,
            PlanSeeder::class,
            AdminSeeder::class,
            CompanyMetaDataSeeder::class,
            ProjectSeeder::class,
            WorkDaySeeder::class,
            UserSeeder::class,
            SettingSeeder::class,
            ReservationSeeder::class,


        ]);

    }
}
