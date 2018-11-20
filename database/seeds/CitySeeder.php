<?php

use Illuminate\Database\Seeder;
use App\Models\City as City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(City::class)->create([
            'name' => 'القاهرة'
            ]);
    }
}
