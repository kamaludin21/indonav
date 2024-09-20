<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $product_categories = [
      [
        "title" => "GNSS System",
        "slug" => "gnss-system",
        "description" => null,
        "created_at" => "2024-09-08T00:16:02.000Z",
        "updated_at" => "2024-09-08T00:16:02.000Z"
      ]
    ];
    foreach ($product_categories as $data) {
      ProductCategory::create([
        'title' => $data['title'],
        'slug' => $data['slug'],
        'description' => $data['description'],
        'created_at' => $data['created_at'],
        'updated_at' => $data['updated_at'],
      ]);
    }
  }
}
