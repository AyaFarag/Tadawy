<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new App\Models\Admin;
        $admin->name = 'admin';
        $admin->email = 'admin@mail.com';
        $admin->password = bcrypt(123456);
        $admin->save();
    }
}
