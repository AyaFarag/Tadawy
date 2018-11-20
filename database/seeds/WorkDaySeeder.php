<?php

use Illuminate\Database\Seeder;
use App\Models\WorkDay;

class WorkDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(WorkDay::class)->create([],1);
    }
}
