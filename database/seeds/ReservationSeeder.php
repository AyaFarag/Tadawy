<?php

use Illuminate\Database\Seeder;
use App\Models\Reservation;
class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Reservation::class)->create([],1);
    }
}
