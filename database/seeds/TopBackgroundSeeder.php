<?php

use App\TopBackground;
use Illuminate\Database\Seeder;

class TopBackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $topbackgroud =  TopBackground::first();

       if (is_null($topbackgroud)){
           DB::table('top_backgrounds')->insert([
               'image' => "Please Upload an Image",
               'text' => "Lorem Ipsum Text",
           ]);
       }

    }
}
