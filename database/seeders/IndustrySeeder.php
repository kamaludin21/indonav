<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $industries = [
      [
        "title" => "Surveying & Engineering",
        "slug" => "surveying-engineering",
        "description" => "We develop and deliver advanced solutions to make surveying & engineering more productive. From post-processing geodetic GNSS receivers to the GNSS IMU RTK antennas, our solutions cover a wide range of applications such as construction and geodetic surveys or layout planning.",
        "image" => null,
        "created_at" => "2024-09-04T18:45:13.000Z",
        "updated_at" => "2024-09-06T22:09:25.000Z"
      ],
      [
        "title" => "Mapping & Geospatial",
        "slug" => "mapping-geospatial",
        "description" => "CHCNAV creates advanced hardware and software solutions for mapping and geospatial mass data acquisition, processing, and maintenance. Our lidar and airborne drones reflect the latest developments in laser scanning technology and meet the accelerating demand for smart city applications worldwide.",
        "image" => null,
        "created_at" => "2024-09-06T22:18:43.000Z",
        "updated_at" => "2024-09-06T22:18:43.000Z"
      ]
    ];

    foreach ($industries as $data) {
      Industry::create([
        'title' => $data['title'],
        'slug' => $data['slug'],
        'description' => $data['description'],
        'image' => $data['image'],
        'created_at' => $data['created_at'],
        'updated_at' => $data['updated_at'],
      ]);
    }
  }
}
