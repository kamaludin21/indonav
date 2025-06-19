<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // $products = [
    //   [
    //     "product_category_id" => 1,
    //     "title" => "iBase GNSS",
    //     "slug" => "ibase-gnss",
    //     "description" => "The iBase GNSS receiver is a fully integrated professional GNSS base station specifically designed to meet 95% of surveyors' needs when working in UHF GNSS base and rover mode. The performance of the iBase UHF base station compared to a standard external UHF radio modem is almost perfect.",
    //     "content" => "<h2>THE CONCEPT OF GNSS RTK STATION REDEFINED<\\\/h2><h3>Start your projects in fractions of seconds<\\\/h3><p>The iBase GNSS station is an all-in-one RTK GNSS station. No more cables or external batteries. No need to take many accessories, resulting in easier operation. The simplicity of the setup process improves work efficiency at least 3 times compared to conventional external radio solutions. Beyond a simple GNSS station, the iBase also includes a 4G modem for transmitting GNSS corrections via TCP\\\/IP server.&nbsp;<\\\/p>",
    //     "image" => "news\\\/2024\\\/09\\\/01J7ED0NBD46RFGRWDP44EWFN2.png",
    //     "created_at" => "2024-09-10T02:42:06.000Z",
    //     "updated_at" => "2024-09-10T02:42:06.000Z"
    //   ],
    //   [
    //     "product_category_id" => 1,
    //     "title" => "i76 PALM-SIZED VISUAL IMU-RTK GNSS",
    //     "slug" => "i76-palm-sized-visual-imu-rtk-gnss",
    //     "description" => "A lightweight tool with integrated GNSS, IMU RTK, dual cameras, CAD+AR visual stakeout, IP68 protection, and 2-meter drop resistance for improved efficiency in the field.",
    //     "content" => "<h2>EFFICIENT CAD AR STAKEOUT<\\\/h2><h3>Enhance project stakeout efficiency by up to 40%<\\\/h3><p>The i76 boosts stakeout efficiency in construction projects by 40% in comparison to traditional surveying methods by integrating CAD base maps with augmented reality (AR) visualization, utilizing GNSS, IMU, AR, and mixed reality (MR) technologies. This offers a comprehensive and intuitive view of site layouts, aiding path planning, minimizing detours, and simplifying tasks like pipeline direction anticipation and foundation building. The AR overlay is particularly valuable for redline reviews, centerline verifications, and optimization of stakeout operations in diverse construction scenarios.&nbsp; &nbsp;<\\\/p>",
    //     "image" => "news\\\/2024\\\/09\\\/01J7ED4TQJ7PYARNG8PX2R1PMT.png",
    //     "created_at" => "2024-09-10T02:44:23.000Z",
    //     "updated_at" => "2024-09-10T02:44:23.000Z"
    //   ],
    //   [
    //     "product_category_id" => 1,
    //     "title" => "i93 VISUAL IMU-RTK GNSS",
    //     "slug" => "i93-visual-imu-rtk-gnss",
    //     "description" => "The i93 is a highly versatile receiver that combines cutting-edge GNSS, Auto-IMU, RTK, and dual-camera technologies. It utilizes the iStar GNSS RTK algorithm, multi-band GNSS channels, and a hybrid engine to achieve precise positioning and surveying under challenging environments.",
    //     "content" => "<h2>1408 CHANNELS, ISTAR AND HYBRID ENGINE<\\\/h2><h3>Enhanced GNSS RTK performance in challenging environments<\\\/h3><p>The i93 GNSS receiver features 1408 channels that track full constellations and frequencies, it’s powered by an integrated RF-SoC processor and iStar CHCNAV technology. With a 15% gain in survey-grade GNSS RTK performance in challenging environments, the i93 delivers reliable and accurate positioning data. The built-in hybrid engine and proprietary narrowband interference mitigation technique boost GNSS data quality and signal tracking capabilities by more than 20%, ensuring the best possible GNSS RTK performance for any application.<\\\/p>",
    //     "image" => "news\\\/2024\\\/09\\\/01J7ED8WVT119AR485ZKEST8N4.png",
    //     "created_at" => "2024-09-10T02:46:36.000Z",
    //     "updated_at" => "2024-09-10T02:46:36.000Z"
    //   ]
    // ];

    // foreach ($products as $data) {
    //   Product::create([
    //     'product_category_id' => $data['product_category_id'],
    //     'title' => $data['title'],
    //     'slug' => $data['slug'],
    //     'description' => $data['description'],
    //     'content' => $data['content'],
    //     'image' => $data['image'],
    //     'created_at' => $data['created_at'],
    //     'updated_at' => $data['updated_at'],
    //   ]);
    // }
  }
}
