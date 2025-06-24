<?php

namespace Database\Seeders;

use App\Models\TicketCategory;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketCategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $now = Carbon::now();

    $categories = [
      [
        "title" => "Permintaan Penawaran Harga (Quotation)",
        "description" => "Permintaan informasi atau penawaran harga produk atau layanan kami.",
        "created_at" => "2024-09-04 18:45:13",
        "updated_at" => $now,
      ],
      [
        "title" => "Dukungan Teknis",
        "description" => "Permintaan bantuan atau panduan terkait penggunaan produk.",
        "created_at" => "2024-10-01 12:15:00",
        "updated_at" => $now,
      ],
      [
        "title" => "Permintaan Demo Produk",
        "description" => "Permintaan untuk mendemonstrasikan fitur dan manfaat produk.",
        "created_at" => "2024-11-10 09:30:00",
        "updated_at" => $now,
      ],
      [
        "title" => "Konsultasi Proyek",
        "description" => "Diskusi atau konsultasi untuk solusi dalam proyek pelanggan.",
        "created_at" => "2024-12-01 16:45:00",
        "updated_at" => $now,
      ],
      [
        "title" => "Kerja Sama/Partnering",
        "description" => "Ajakan kerja sama atau kemitraan strategis.",
        "created_at" => "2025-01-15 11:20:00",
        "updated_at" => $now,
      ],
      [
        "title" => "Komplain/Laporan Masalah",
        "description" => "Laporan masalah, kerusakan, atau keluhan terkait produk/layanan.",
        "created_at" => "2025-02-20 14:10:00",
        "updated_at" => $now,
      ],
      [
        "title" => "Lainnya",
        "description" => "Kategori lainnya di luar opsi yang tersedia.",
        "created_at" => "2025-03-05 10:00:00",
        "updated_at" => $now,
      ],
    ];

    foreach ($categories as $data) {
      TicketCategory::create($data);
    }
  }
}
