<?php

use Illuminate\Database\Seeder;
use App\Models\Country as Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Country::class)->create([
            'name' => 'مصر'
            ]);
    }
}
