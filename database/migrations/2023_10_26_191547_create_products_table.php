<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_slug')->nullable();
            $table->string('product_title')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('product_weight')->nullable();
            $table->text('product_about')->nullable();
            $table->string('product_image')->default('media/product/empty-image.png');
            $table->integer('product_status')->default(0);
            $table->string('product_code')->nullable();
            $table->integer('product_price')->nullable();
            $table->integer('product_home')->default(0);
            $table->integer('product_amount')->default(1);
            $table->timestamps();
            $table->softDeletes();

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
};
