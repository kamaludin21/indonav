<?php

use App\Models\Product;
use App\Models\ProductCategory;
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
    Schema::create('product_categories', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->string('slug');
      $table->text('description')->nullable();
      $table->timestamps();
    });

    // Pivot table: (Pending)
    // Schema::create('category_product', function (Blueprint $table) {
    //   $table->id();
    //   $table->foreignIdFor(Product::class)->constrained()->onDelete('cascade');
    //   $table->foreignIdFor(ProductCategory::class)->constrained()->onDelete('cascade');
    //   $table->timestamps();
    // });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('product_categories');
  }
};
