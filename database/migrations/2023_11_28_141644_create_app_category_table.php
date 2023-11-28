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
        Schema::create('app_category', function (Blueprint $table) {
            $table->unsignedBigInteger('app_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('app_id')
            ->references('id')
            ->on('app')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE'); 

            $table->foreign('category_id')
            ->references('id')
            ->on('category')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_category');
    }
};
