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
      ),
      array(
        "id" => 6,
        "title" => "tentang kami",
        "slug" => "tentang-kami",
        "url" => null,
        "image" => null,
        "description" => "<p>INDONAV is a pioneering company specializing in advanced GNSS navigation and positioning solutions. With a focus on innovation, INDONAV is committed to delivering top-tier technologies that meet the evolving needs of industries worldwide. Their solutions empower businesses to achieve precision and efficiency in range of applications, from land surveying to autonomous systems With a steadily growing presence across global markets, INDONAV has emerged as a key player in the field of geomatics technology.<\/p><p>Their success is driven by a dedication to research and development, which keeps them at the forefront of industry advancements. As one of the fastest-growing companies in this space, INDONAV continues to redefine the possibilities of navigation and positioning.<\/p>",
        "created_at" => "2024-09-08T17:51:51.000Z",
        "updated_at" => "2024-09-08T17:57:29.000Z"
      ),
      array(
        "id" => 7,
        "title" => "Support Training",
        "slug" => "support-training",
        "url" => null,
        "image" => null,
        "description" => "<h2>GLOBAL TECHNICAL SUPPORT<\/h2><p>CHC Navigation provides essential support services including online technical assistance, powerful proactive support resources, and product updates. With global coverage and 100+ trained professional dealers and customer support specialists, CHC Navigation delivers complete and trustworthy service.<\/p>",
        "created_at" => "2024-09-08T18:10:42.000Z",
        "updated_at" => "2024-09-08T18:11:07.000Z"
      ),
      array(
        "id" => 8,
        "title" => "Maintenance Repair",
        "slug" => "maintenance-repair",
        "url" => null,
        "image" => null,
        "description" => "<h2>GLOBAL REPAIR SERVICE<\/h2><p>CHC Navigation understands how downtime can impact our customer productivity. The combination of CHCNAV’s Regional Service Centers in Americas, EMEA and Asia and a global network of Certified Dealers’ Repair Centers, all our customers benefits from local maintenance and repair to ensure optimal performances of our products and solutions.<\/p>",
        "created_at" => "2024-09-08T18:11:49.000Z",
        "updated_at" => "2024-09-08T18:11:49.000Z"
      ),
      array(
        "id" => 9,
        "title" => "Overview",
        "slug" => "overview",
        "url" => null,
        "image" => null,
        "description" => "<h2><strong>ABOUT CHC NAVIGATION<\/strong><\/h2><p>Founded in 2003, CHC Navigation (Huace:300627.SZ) creates innovative GNSS navigation and positioning solutions to make customers' work more efficient. CHCNAV products and solutions cover multiple industries such as geospatial, construction, agriculture and marine.<\/p><p>With a presence across the globe, distributors in more than 120 countries and more than 1,700 employees, CHC Navigation is today recognized as one of the fastest growing companies in geomatics technologies.<\/p>",
        "created_at" => "2024-09-08T18:12:44.000Z",
        "updated_at" => "2024-09-08T18:12:44.000Z"
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
        'created_at' => $data['created_at'],
        'updated_at' => $data['updated_at'],
      ]);
    }
  }
}
