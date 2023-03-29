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
        Schema::create('applications', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->timestamps();
            $table->string('name', 50);
            $table->string('sum_description', 255);
            $table->boolean('status');
            $table->integer('display');
            $table->foreignId('associate_id');
            $table->foreignIdFor(Associate::class);
            $table->float('price', 8, 2);
            $table->decimal('rating', 8, 2);
            $table->
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
