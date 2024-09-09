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
    $product_categories = array(
      array(
        "id" => 3,
        "title" => "GNSS System",
        "slug" => "gnss-system",
        "description" => null,
        "created_at" => "2024-09-08T07:16:02.000Z",
        "updated_at" => "2024-09-08T07:16:02.000Z"
      ),
      array(
        "id" => 4,
        "title" => "Total Stations",
        "slug" => "total-stations",
        "description" => null,
        "created_at" => "2024-09-08T07:16:45.000Z",
        "updated_at" => "2024-09-08T07:16:45.000Z"
      ),
      array(
        "id" => 5,
        "title" => "Marine Systems",
        "slug" => "marine-systems",
        "description" => null,
        "created_at" => "2024-09-08T07:21:33.000Z",
        "updated_at" => "2024-09-08T07:21:33.000Z"
      ),
      array(
        "id" => 6,
        "title" => "Machine Control Solutions",
        "slug" => "machine-control-solutions",
        "description" => null,
        "created_at" => "2024-09-08T07:21:57.000Z",
        "updated_at" => "2024-09-08T07:40:49.000Z"
      )
    );

    foreach ($product_categories as $data) {
      ProductCategory::create([
        'id' => $data['id'],
        'title' => $data['title'],
        'slug' => $data['slug'],
        'description' => $data['description'],
        'created_at' => $data['created_at'],
        'updated_at' => $data['updated_at'],
      ]);
    }
  }
}
