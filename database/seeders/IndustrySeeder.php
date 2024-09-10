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
        "created_at" => "2024-09-05T01:45:13.000Z",
        "updated_at" => "2024-09-07T05:09:25.000Z"
      ],
      // [
      //   "id" => 2,
      //   "title" => "Machine Control & Construction",
      //   "slug" => "machine-control-construction",
      //   "description" => "We provide solutions for the entire site, from GNSS rovers with CAD field surveying software to GNSS machine control technologies for excavators, dozers, compactors, and motor graders. Our systems bring significant gains in productivity, accuracy, and speed to any earthmoving application. ",
      //   "image" => null,
      //   "created_at" => "2024-09-07T05:14:49.000Z",
      //   "updated_at" => "2024-09-07T05:14:49.000Z"
      // ],
      [
        "title" => "Mapping & Geospatial",
        "slug" => "mapping-geospatial",
        "description" => "CHCNAV creates advanced hardware and software solutions for mapping and geospatial mass data acquisition, processing, and maintenance. Our lidar and airborne drones reflect the latest developments in laser scanning technology and meet the accelerating demand for smart city applications worldwide.",
        "image" => null,
        "created_at" => "2024-09-07T05:18:43.000Z",
        "updated_at" => "2024-09-07T05:18:43.000Z"
      ],
      // [
      //   "id" => 5,
      //   "title" => "Infrastructure",
      //   "slug" => "infrastructure",
      //   "description" => "Our GNSS infrastructure solutions, such as GNSS sensors, antennas, and server-based computing software, deliver consistent, reliable, and accurate real-time GNSS data for high-precision positioning and navigation applications, from GNSS RTK networks to structural deformation monitoring. ",
      //   "image" => null,
      //   "created_at" => "2024-09-07T05:19:00.000Z",
      //   "updated_at" => "2024-09-07T05:19:00.000Z"
      // ],
      // [
      //   "id" => 6,
      //   "title" => "Marine Construction",
      //   "slug" => "marine-construction",
      //   "description" => "CHCNAV's USVs, rugged GNSS positioning and heading sensors, ADCPs, and echo sounders provide a comprehensive set of solutions for hydrographic surveying, engineering, and construction professionals, delivering accurate positioning performance for typical bathymetric survey and mapping tasks.",
      //   "image" => null,
      //   "created_at" => "2024-09-07T05:28:08.000Z",
      //   "updated_at" => "2024-09-07T05:28:08.000Z"
      // ],
      // [
      //   "id" => 7,
      //   "title" => "Precision Agriculture",
      //   "slug" => "precision-agriculture",
      //   "description" => "Easy to use and affordable, CHCNAV's GNSS RTK autosteering systems and network solutions dramatically increase farmers' productivity and reduce environmental impact of agriculture. Our auto-steering kits for farming machines provide farmers with higher yields, save time, and generate savings on chem",
      //   "image" => null,
      //   "created_at" => "2024-09-07T05:31:00.000Z",
      //   "updated_at" => "2024-09-07T05:31:00.000Z"
      // ],
      // [
      //   "id" => 8,
      //   "title" => "Navigation & Positioning\n",
      //   "slug" => "navigation-positioning",
      //   "description" => "With our engineering expertise and lean manufacturing process, we provide customized GNSS solutions to industrial partners and system integrators. Our OEM solutions consist of state-of-the-art GNSS sensors for all static and dynamic applications, as well as GNSS boards for i",
      //   "image" => null,
      //   "created_at" => "2024-09-07T05:31:15.000Z",
      //   "updated_at" => "2024-09-07T05:31:15.000Z"
      // ]
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
