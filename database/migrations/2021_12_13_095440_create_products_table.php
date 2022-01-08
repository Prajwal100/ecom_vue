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
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('thumbnail_image')->default('backend/img/default-img.jpg');
            $table->unsignedBigInteger('cat_id');
            $table->decimal('unit_price');
            $table->decimal('purchase_price');
            $table->integer('discount')->default(0);
            $table->integer('quantity')->default(0);

            $table->text('summary')->nullable();
            $table->longText('description')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
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
