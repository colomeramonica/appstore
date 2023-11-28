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
        Schema::create('developer', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('company_name', 255);
            $table->string('contact_email', 90);
            $table->string('contact_phone', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developer');
    }
};
