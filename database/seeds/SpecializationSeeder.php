<?php

use Illuminate\Database\Seeder;
use App\Models\Category as Category;
use App\Models\Specialization as Specialization;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Specialization::class)->create();
    }
}
