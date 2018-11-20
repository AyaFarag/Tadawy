<?php

use Illuminate\Database\Seeder;

use App\Models\CompanyMetaData;

class CompanyMetaDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CompanyMetaData::class)->create([],1);
    }
}
