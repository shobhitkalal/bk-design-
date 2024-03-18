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
        Schema::create('designss', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('DesignCategory')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('designcategory_id');
            $table->foreign('designcategory_id')->references('id')->on('Designcategory')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designss');
    }
};
