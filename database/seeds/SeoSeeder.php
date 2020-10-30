<?php

use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seos')->insert([
            'web_description' => Str::random(20),
            'web_keyword' => Str::random(20),
            'author' => Str::random(20),
        ]);
    }
}
