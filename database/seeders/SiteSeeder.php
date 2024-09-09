<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $sites = array(
      array(
        "id" => 1,
        "title" => "email",
        "slug" => "email",
        "url" => null,
        "image" => null,
        "description" => "indonav@mail.com",
        "created_at" => "2024-09-08T16:40:17.000Z",
        "updated_at" => "2024-09-08T16:40:17.000Z"
      ),
      array(
        "id" => 2,
        "title" => "phone",
        "slug" => "phone",
        "url" => null,
        "image" => null,
        "description" => "+6309-4934-9293",
        "created_at" => "2024-09-08T16:40:26.000Z",
        "updated_at" => "2024-09-08T16:40:26.000Z"
      ),
      array(
        "id" => 5,
        "title" => "alamat",
        "slug" => "alamat",
        "url" => null,
        "image" => null,
        "description" => "Jalan Meruya Ilir, Rukan Business Park Kebun Jeruk Blok F-1 No.12, Jakarta Barat",
        "created_at" => "2024-09-08T17:20:22.000Z",
        "updated_at" => "2024-09-08T17:20:22.000Z"
      ),
      array(
        "id" => 3,
        "title" => "Logo desktop",
        "slug" => "logo-desktop",
        "url" => "\/",
        "image" => "industries\/2024\/09\/01J7A06F64J31W0TRPJJTK4516.png",
        "description" => "logo pada desktop",
        "created_at" => "2024-09-08T16:41:07.000Z",
        "updated_at" => "2024-09-08T17:24:17.000Z"
      ),
      array(
        "id" => 4,
        "title" => "Logo mobile",
        "slug" => "logo-mobile",
        "url" => "\/",
        "image" => "industries\/2024\/09\/01J7A08FJNZ13CR1DYBKFWQYNM.png",
        "description" => "logo mobile",
        "created_at" => "2024-09-08T16:42:13.000Z",
        "updated_at" => "2024-09-08T17:25:15.000Z"
      )
    );

    foreach ($sites as $data) {
      Site::create([
        'id' => $data['id'],
        'title' => $data['title'],
        'slug' => $data['slug'],
        'image' => $data['image'],
        'url' => $data['url'],
        'description' => $data['description'],
        'publish_date' => $data['publish_date'],
        'created_at' => $data['created_at'],
        'updated_at' => $data['updated_at'],
      ]);
    }
  }
}
