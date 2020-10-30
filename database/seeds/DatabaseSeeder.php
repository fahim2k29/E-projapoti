<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $this->call([
            ConfigurationSeeder::class,
            AdminTableSeeder::class,
            TopBackgroundSeeder::class,
            SeoSeeder::class,
            HomeSectionTitleSeeder::class,
            FooterMenuSeeder::class,
            AreaSeeder::class,
            ]);


    }
}
