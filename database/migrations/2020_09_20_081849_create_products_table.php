<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('title')->nullable();
            $table->text('description')->nullable();

            $table->decimal('mrp_price',14,2)->nullable();
            $table->decimal('business_price',14,2)->nullable();
            $table->decimal('corporate_price',14,2)->nullable();
            $table->decimal('discount_price',14,2)->nullable();

            $table->integer('wholesaleCheck')->nullable();
            $table->integer('corporateCheck')->nullable();

            $table->integer('minimumWholesale')->nullable();
            $table->integer('minimumCorporate')->nullable();

            $table->boolean('has_offer')->default(1);
            $table->string('product_code')->nullable();

            $table->float('quantity',14,2);
            $table->string('slug');

            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('subsubcategory_id')->nullable();

            $table->boolean('status')->default(1);

            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories');
            $table->foreign('subsubcategory_id')->references('id')->on('sub_sub_categories');

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
        Schema::dropIfExists('products');
    }
}
