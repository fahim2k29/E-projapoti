<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSectionTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_section_titles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_category')->nullable();
            $table->string('how_to_order')->nullable();
            $table->string('special_offer')->nullable();
            $table->string('why_love_us')->nullable();
            $table->string('what_clients_say')->nullable();
            $table->string('be_a_family')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_section_titles');
    }
}
