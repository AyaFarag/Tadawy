<?php

use Illuminate\Database\Seeder;
use App\Models\Pages;
class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pages::class)->create([
            'title' => 'About Us',
            'slug' => Pages::ABOUT_US
        ],1);
        factory(Pages::class)->create([
            'title' => 'About Us',
            'slug' => Pages::PRIVACY
        ],1);
    }
}
