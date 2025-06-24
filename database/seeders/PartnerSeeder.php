<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $partners = [
      'CV. Duta Pratamindo',
      'Dexsa Utama',
      'Kencana Agung',
      'ASIMAS',
      'GIM',
      'MTS Inc.',
      'Jaya Survey Indonesia',
      'Buana Survey',
      'Nusatrack',
    ];

    foreach ($partners as $index => $title) {
      Partner::create([
        'title' => $title,
        'image' => null,
        'url' => null,
        'order' => $index + 1,
      ]);
    }
  }
}
