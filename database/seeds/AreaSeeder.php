<?php

use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            'area_name' => "Mohammadpur",
        ]);

        DB::table('areas')->insert([
            'area_name' => "Adabor",
        ]);

        DB::table('areas')->insert([
            'area_name' => "Mirpur",
        ]);

        DB::table('areas')->insert([
            'area_name' => "Panthopath",
        ]);

        DB::table('areas')->insert([
            'area_name' => "Mohakhali",
        ]);

        DB::table('areas')->insert([
            'area_name' => "Uttara",
        ]);

        DB::table('areas')->insert([
            'area_name' => "Shahabag",
        ]);

        DB::table('areas')->insert([
            'area_name' => "Banani",
        ]);

        DB::table('areas')->insert([
            'area_name' => "Gulshan",
        ]);

        DB::table('areas')->insert([
            'area_name' => "Badda",
        ]);

        DB::table('areas')->insert([
            'area_name' => "Gabtoli",
        ]);

        DB::table('areas')->insert([
            'area_name' => "Azimpur",
        ]);

        DB::table('areas')->insert([
            'area_name' => "Malibagh",
        ]);
    }
}
