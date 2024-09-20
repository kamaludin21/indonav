<?php

namespace Database\Seeders;

use App\Models\Slideshow;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlideshowSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $slideshows = [
      [
        "title" => "Surveying & Engineering",
        "slug" => "surveying-engineering",
        "image" => "slideshow/2024/09/01J78BCRQ4C5EZB407C3CZHSWD.jpg",
        "description" => "We develop and deliver advanced solutions to make surveying & engineering more productive. From post-processing geodetic GNSS receivers to the GNSS IMU RTK antennas, our solutions cover a wide range of applications such as construction and geodetic surveys or layout planning.",
        "content" => null,
        "redirect" => "\/industries\/surveying-engineering",
      ],
      [
        "title" => "Mapping & Geospatial",
        "slug" => "mapping-geospatial",
        "image" => "slideshow/2024/09/01J7EEW1NHKGS46J81JG9BKFDD.jpg",
        "description" => "INDONAV creates advanced hardware and software solutions for mapping and geospatial mass data acquisition, processing, and maintenance. Our lidar and airborne drones reflect the latest developments in laser scanning technology and meet the accelerating demand for smart city applications worldwide.",
        "content" => "<h2>MOBILE MAPPING</h2><p>CHCNAV's mobile mapping division enables the digital world by merging and fusing technologies. Ground and airborne mobile mapping systems combine state-of-the-art, high-performance hardware, such as accurate long-range laser scanners, high-resolution HDR panoramic cameras, and advanced GNSS receivers with high-precision IMU. Our drones and mobile mapping platforms are portable and robust, allowing for efficient deployment in the field. In addition, our advanced software algorithms process massive 3D point clouds quickly and efficiently.</p><h2>UNMANNED AERIAL MAPPING</h2><p>CHCNAV's Unmanned Aerial Vehicles (UAVs) are extensively used for photogrammetry, land surveying, 3D mapping, and topographic surveying. Many industries, such as construction, oil and gas, infrastructure, archaeology, mining, forestry, and agriculture, have found CHCNAV's solutions a better alternative to traditional surveying methods. Our autonomous, long-range drones with large payload capacity, combined with scanners and cameras, effectively capture 3D data over large areas in a short period of time.</p>",
        "redirect" => "\/industries\/mapping-geospatial\/",
      ]
    ];

    foreach ($slideshows as $data) {
      Slideshow::create([
        'title' => $data['title'],
        'slug' => $data['slug'],
        'image' => $data['image'],
        'description' => $data['description'],
        'content' => $data['content'],
        'redirect' => $data['redirect'],
      ]);
    }
  }
}
