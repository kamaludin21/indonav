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
        Schema::create('download_centers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('category', ['surveying_and_engineering', '3d_modelling', 'hidrografi', 'video_tutorial',]);
            //Type: Firmware, Board Firmware, Software, Manual, Video Tutorial
            $table->enum('type', [
                'firmware',
                'board_firmware',
                'software',
                'manual',
                'video_tutorial'
            ]);
            $table->string('file_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('download_centers');
    }
};
