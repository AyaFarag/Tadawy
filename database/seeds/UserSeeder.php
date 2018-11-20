<?php

use Illuminate\Database\Seeder;

use App\Models\Api\User;

use Faker\Factory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
      

        // Client
        factory(User::class, 1)->create();
    }
}
