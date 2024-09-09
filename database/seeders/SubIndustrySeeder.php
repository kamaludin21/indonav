<?php

namespace Database\Seeders;

use App\Models\SubIndustry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubIndustrySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $sub_industries = array(
      array(
        "id" => 2,
        "industry_id" => 1,
        "title" => "Site Positioning",
        "slug" => "site-positioning",
        "description" => "From topographic work to precision agriculture, when timely and accurate completion of surveying or construction projects is required, you can rely on CHCNAV site positioning solutions. Whether it's a single GNSS RTK base receiver or a regional\/national GNSS RTK network, our turnkey positioning solu",
        "created_at" => "2024-09-08T00:45:41.000Z",
        "updated_at" => "2024-09-08T00:45:41.000Z"
      ),
      array(
        "id" => 1,
        "industry_id" => 1,
        "title" => "Land Surveying",
        "slug" => "land-surveying",
        "description" => "CHCNAV's GNSS receivers, controllers, total stations, and software provide exceptional reliability and robust positioning accuracy at any job site. Our systems are all designed to operate in the most demanding environments and applications. In addition, the optimized workflow of our surveying soluti",
        "created_at" => "2024-09-08T00:45:18.000Z",
        "updated_at" => "2024-09-08T00:46:46.000Z"
      ),
      array(
        "id" => 3,
        "industry_id" => 2,
        "title" => "Machine Control & Construction",
        "slug" => "machine-control-construction",
        "description" => "CHCNAV's GNSS receivers, controllers, total stations, and software provide exceptional reliability and robust positioning accuracy at any job site. Our systems are all designed to operate in the most demanding environments and applications. In addition, the optimized workflow of our surveying soluti",
        "created_at" => "2024-09-08T00:47:56.000Z",
        "updated_at" => "2024-09-08T00:47:56.000Z"
      ),
      array(
        "id" => 4,
        "industry_id" => 2,
        "title" => "Machine Control",
        "slug" => "machine-control",
        "description" => "CHCNAV's turnkey control and guidance systems for excavators, graders, and dozers are available at an affordable price and are suitable for compact and heavy equipment. Our GNSS RTK sensors, specifically designed to be integrated into mining and construction vehicles, make your machines more product",
        "created_at" => "2024-09-08T00:48:19.000Z",
        "updated_at" => "2024-09-08T00:48:19.000Z"
      ),
      array(
        "id" => 5,
        "industry_id" => 2,
        "title" => "Site Positioning",
        "slug" => "site-positioning",
        "description" => "From topographic work to precision agriculture, when timely and accurate completion of surveying or construction projects is required, you can rely on CHCNAV site positioning solutions. Whether it's a single GNSS RTK base receiver or a regional\/national GNSS RTK network, our turnkey positioning solu",
        "created_at" => "2024-09-08T00:48:57.000Z",
        "updated_at" => "2024-09-08T00:48:57.000Z"
      )
    );

    foreach ($sub_industries as $data) {
      SubIndustry::create([
        'id' => $data['id'],
        'industry_id' => $data['industry_id'],
        'title' => $data['title'],
        'slug' => $data['slug'],
        'description' => $data['description'],
        'created_at' => $data['created_at'],
        'updated_at' => $data['updated_at'],
      ]);
    }
  }
}
