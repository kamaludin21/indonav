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
                "description" => "Teknologi dan perangkat lunak GNSS untuk posisi presisi tinggi dalam survei dan konstruksi",
                "image" => "industries/2025/06/01JY10QPMXD4BM9N7M845GBGYN.jpg",
                "created_at" => "2024-09-04 18:45:13",
                "updated_at" => "2025-06-18 14:58:24"
            ],
            [
                "title" => "3D Mobile Mapping",
                "slug" => "3d-mobile-mapping",
                "description" => "Teknologi LiDAR, pencitraan, dan UAV untuk tangkapan realitas 3D yang memukau dari darat maupun udara.",
                "image" => "industries/2025/06/01JY10N5YG12T3QGW4M9JE0A4Q.jpg",
                "created_at" => "2025-06-18 07:26:30",
                "updated_at" => "2025-06-18 14:57:22"
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
