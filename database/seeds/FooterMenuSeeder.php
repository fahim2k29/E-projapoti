<?php

use Illuminate\Database\Seeder;

class FooterMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('footer_section_menus')->insert([
            'title_one' => Str::random(20),
            'title_two' => Str::random(20),
            'title_three' => Str::random(20)
        ]);
    }
}
