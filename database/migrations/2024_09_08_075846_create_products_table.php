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
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(Industry::class)->constrained();
      $table->string('title');
      $table->string('slug');
      $table->string('image_product');
      $table->text('description')->nullable();
      $table->string('image_highlight')->nullable();
      $table->text('highlight')->nullable();
      $table->json('features')->nullable();
      $table->json('specifications')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('products');
  }
};
