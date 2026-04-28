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
        Schema::create('service_pages', function (Blueprint $table) {
            $table->id();

            // Sebagai penanda untuk jenis layanan, misalnya:
            // 1. Foto Udara (foto-udara) sekaligus sebagai slug untuk URL
            $table->string('label')->nullable();
            $table->string('slug');

            // Hero
            $table->string('image')->nullable();

            $table->string('title')->nullable();

            // Output
            $table->json('outputs')->nullable(); // repeater list
            $table->json('formats')->nullable(); // multiple select

            // Content sections
            $table->json('sections')->nullable(); // repeater section

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_pages');
    }
};
