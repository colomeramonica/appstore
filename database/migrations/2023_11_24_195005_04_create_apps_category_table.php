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
        Schema::create('apps_category', function (Blueprint $table) {
            $table->integer('app_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->timestamps();

            $table->foreign('app_id')
            ->references('app_id')
            ->on('app')
            ->onDelete('CASCADE'); 

            $table->foreign('category_id')
            ->references('category_id')
            ->on('category')
            ->onDelete('CASCADE'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apps_category');
    }
};
