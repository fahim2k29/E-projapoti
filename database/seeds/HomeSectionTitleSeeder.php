<?php

use Illuminate\Database\Seeder;

class HomeSectionTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_section_titles')->insert([
            'product_category' => Str::random(20),
            'how_to_order' => Str::random(20),
            'special_offer' => Str::random(20),
            'why_love_us' => Str::random(20),
            'what_clients_say' => Str::random(20),
            'be_a_family' => Str::random(20)
        ]);
    }
}
