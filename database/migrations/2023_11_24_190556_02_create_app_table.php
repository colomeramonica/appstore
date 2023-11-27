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
            $table->increments('app_id');
            $table->integer('dev_id')->unsigned();
            $table->timestamps();
            $table->string('name', 100)->nullable(false);
            $table->string('description', 300)->nullable();
            $table->boolean('status')->nullable(false)->default(1);
            $table->unsignedTinyInteger('display_option')->nullable(false)->default(1);

            $table->foreign('dev_id')
            ->references('dev_id')
            ->on('developer')
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
