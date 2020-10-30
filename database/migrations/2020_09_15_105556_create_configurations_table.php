<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_title')->nullable();
            $table->text('company_description')->nullable();
            $table->string('company_head_number')->nullable();
            $table->string('company_footer_number')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_map_code')->nullable();
            $table->string('company_social_link_one')->nullable();
            $table->string('company_social_link_two')->nullable();
            $table->string('company_social_link_three')->nullable();
            $table->string('company_social_link_four')->nullable();
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
        Schema::dropIfExists('configurations');
    }
}
