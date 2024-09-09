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
    $slideshows = array(
      array(
        "id" => 1,
        "title" => "Surveying & Engineering",
        "slug" => "surveying-engineering",
        "image" => "slideshow\/2024\/09\/01J78BCRQ4C5EZB407C3CZHSWD.jpg",
        "description" => "We develop and deliver advanced solutions to make surveying & engineering more productive. From post-processing geodetic GNSS receivers to the GNSS IMU RTK antennas, our solutions cover a wide range of applications such as construction and geodetic surveys or layout planning.",
        "content" => null,
        "redirect" => "surveying-engineering",
        "publish_date" => "2024-09-07T17:00:00.000Z",
        "created_at" => "2024-09-08T01:18:19.000Z",
        "updated_at" => "2024-09-08T01:18:19.000Z"
      ),
      array(
        "id" => 2,
        "title" => "Machine Control & Construction",
        "slug" => "machine-control-construction",
        "image" => "slideshow\/2024\/09\/01J78D2V2A7Z2R36FQE5F281WH.jpg",
        "description" => "We provide solutions for the entire site, from GNSS rovers with CAD field surveying software to GNSS machine control technologies for excavators, dozers, compactors, and motor graders. Our systems bring significant gains in productivity, accuracy, and speed to any earthmoving application.",
        "content" => null,
        "redirect" => "machine-control-construction",
        "publish_date" => "2024-09-07T17:00:00.000Z",
        "created_at" => "2024-09-08T01:47:51.000Z",
        "updated_at" => "2024-09-08T01:47:51.000Z"
      )
    );
    $slideshows = array(
      array(
        "id" => 1,
        "title" => "Surveying & Engineering",
        "slug" => "surveying-engineering",
        "image" => "slideshow\/2024\/09\/01J78BCRQ4C5EZB407C3CZHSWD.jpg",
        "description" => "We develop and deliver advanced solutions to make surveying & engineering more productive. From post-processing geodetic GNSS receivers to the GNSS IMU RTK antennas, our solutions cover a wide range of applications such as construction and geodetic surveys or layout planning.",
        "content" => null,
        "redirect" => "surveying-engineering",
        "publish_date" => "2024-09-07T17:00:00.000Z",
        "created_at" => "2024-09-08T01:18:19.000Z",
        "updated_at" => "2024-09-08T01:18:19.000Z"
      ),
      array(
        "id" => 2,
        "title" => "Machine Control & Construction",
        "slug" => "machine-control-construction",
        "image" => "slideshow\/2024\/09\/01J78D2V2A7Z2R36FQE5F281WH.jpg",
        "description" => "We provide solutions for the entire site, from GNSS rovers with CAD field surveying software to GNSS machine control technologies for excavators, dozers, compactors, and motor graders. Our systems bring significant gains in productivity, accuracy, and speed to any earthmoving application.",
        "content" => null,
        "redirect" => "machine-control-construction",
        "publish_date" => "2024-09-07T17:00:00.000Z",
        "created_at" => "2024-09-08T01:47:51.000Z",
        "updated_at" => "2024-09-08T01:47:51.000Z"
      )
    );

    foreach ($slideshows as $data) {
      Slideshow::create([
        'id' => $data['id'],
        'title' => $data['title'],
        'slug' => $data['slug'],
        'image' => $data['image'],
        'description' => $data['description'],
        'content' => $data['content'],
        'redirect' => $data['redirect'],
        'publish_date' => $data['publish_date'],
        'created_at' => $data['created_at'],
        'updated_at' => $data['updated_at'],
      ]);
    }
  }
}
