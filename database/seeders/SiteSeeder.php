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
    $sites = [
      [
        "title" => "alamat",
        "slug" => "alamat",
        "url" => null,
        "image" => null,
        "description" => "<p>Inter Corn Kebun Jeruk, Blok U10 No.7, RT.4/RW.3, Srengseng, Kec. Kembangan, Kota Jakarta Barat, 11630</p>",
        "created_at" => "2024-09-08 10:20:22",
        "updated_at" => "2025-06-18 14:06:04"
      ],
      [
        "title" => "phone",
        "slug" => "phone",
        "url" => null,
        "image" => null,
        "description" => "<p>+62812-7884-1888</p>",
        "created_at" => "2024-09-08 09:40:26",
        "updated_at" => "2025-06-18 14:51:48"
      ],
      [
        "title" => "email",
        "slug" => "email",
        "url" => null,
        "image" => null,
        "description" => "<p>info@indonavtech.co.id</p>",
        "created_at" => "2024-09-08 09:40:17",
        "updated_at" => "2025-06-18 14:51:58"
      ],
      [
        "title" => "tentang kami",
        "slug" => "tentang-kami",
        "url" => null,
        "image" => null,
        "description" => "<p><strong>INDONAV </strong>adalah dealer resmi CHCNAV untuk wilayah Indonesia.</p><p>Kami berkomitmen untuk memberikan dukungan dan pelayanan terbaik kepada setiap mitra dan pengguna CHCNAV di seluruh Indonesia.</p>",
        "created_at" => "2024-09-08 10:51:51",
        "updated_at" => "2025-06-18 14:40:40"
      ],
      [
        "title" => "linkedin",
        "slug" => "linkedin",
        "url" => "https://www.linkedin.com/company/indonavindonesia/",
        "image" => null,
        "description" => "<p>Sosial media linkedin</p>",
        "created_at" => "2025-06-18 14:44:30",
        "updated_at" => "2025-06-18 14:44:49"
      ],
      [
        "title" => "instagram",
        "slug" => "instagram",
        "url" => "https://www.instagram.com/indonav_official?igsh=djh6NzF5aTVkczNm",
        "image" => null,
        "description" => "<p>Sosial media instagram</p>",
        "created_at" => "2025-06-18 14:50:05",
        "updated_at" => "2025-06-18 14:50:05"
      ],
      [
        "title" => "Tentang kami footer",
        "slug" => "tentang-kami-footer",
        "url" => null,
        "image" => null,
        "description" => "<p>INDONAV merupakan mitra resmi CHCNAV di Indonesia, siap memberikan solusi dan pelayanan optimal bagi pelanggan di seluruh Indonesia.</p>",
        "created_at" => "2025-06-18 15:14:29",
        "updated_at" => "2025-06-18 15:14:29"
      ]
    ];


    foreach ($sites as $data) {
      Site::create([
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
