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
        Schema::create('app', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dev_id');
            $table->timestamps();
            $table->string('name', 255);
            $table->string('description', 255);
            $table->float('price')->nullable();
            $table->float('rating')->nullable();
            $table->boolean('status')->nullable(false)->default(1);
            $table->unsignedTinyInteger('display_option')->nullable(false)->default(1);

            $table->foreign('dev_id')
            ->references('id')
            ->on('developer')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app');
    }
};
