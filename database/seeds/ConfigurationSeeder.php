<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configurations')->insert([
            'company_name' => Str::random(20),
            'company_logo' => Str::random(20),
            'company_email' => Str::random(10).'@gmail.com',
            'company_description' => Str::random(20),
            'company_title' => Str::random(20),
            'company_head_number' => Str::random(20),
            'company_footer_number' => Str::random(20),
            'company_address' => Str::random(20),
            'company_map_code' => Str::random(20),
            'company_social_link_one' => Str::random(20),
            'company_social_link_two' => Str::random(20),
            'company_social_link_three' => Str::random(20),
            'company_social_link_four' => Str::random(20),
        ]);
    }
}
