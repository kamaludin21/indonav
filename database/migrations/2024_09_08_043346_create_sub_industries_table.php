<?php

use App\Models\Industry;
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
    Schema::create('sub_industries', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(Industry::class)
        ->constrained();
      $table->string('title');
      $table->string('slug');
      $table->text('description');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('sub_industries');
  }
};
