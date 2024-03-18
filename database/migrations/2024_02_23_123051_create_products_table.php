<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
           $table->string('name');
            $table->string('brand')->nullable();
            $table->text('description')->nullable();
            $table->integer('selling_price');
            $table->integer('original_price');
            $table->integer('qty');
            $table->unsignedBigInteger('category_id');
            $table->tinyInteger('status')->default('0')->comment('0-inactive,1-active');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
