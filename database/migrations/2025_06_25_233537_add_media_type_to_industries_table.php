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
    Schema::table('industries', function (Blueprint $table) {
      $table->string('media_type')->default('image');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('industries', function (Blueprint $table) {
      $table->dropColumn('media_type');
    });
  }
};
