<?php

use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for( $i = 0; $i<3; $i++ ) {
            $plan = new App\Models\Plan;
            $plan->title = 'Title';
            $plan->duration = '1 month';
            $plan->documents = '4';
            $plan->save();
            }
    }
}
