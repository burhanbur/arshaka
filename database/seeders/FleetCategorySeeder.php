<?php

namespace Database\Seeders;

use App\Models\FleetCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FleetCategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('fleet_categories')->delete();

        $categories = [
            [
                'name'        => 'Truck Engkel',
                'slug'        => 'engkel',
                'description' => 'Truck engkel adalah pilihan tepat untuk pengiriman dalam kota maupun antar kota dengan kebutuhan muatan menengah. Lincah di berbagai kondisi jalan dan efisien untuk distribusi barang ke berbagai titik.',
                'order'       => 1,
                'is_active'   => true,
                'created_by'  => null,
                'updated_by'  => null,
            ],
            [
                'name'        => 'Truck Double',
                'slug'        => 'double',
                'description' => 'Truck double memberikan kapasitas angkut yang lebih besar, ideal untuk distribusi barang dalam volume menengah ke besar. Tersedia dalam konfigurasi bak terbuka maupun bak tertutup sesuai kebutuhan klien.',
                'order'       => 2,
                'is_active'   => true,
                'created_by'  => null,
                'updated_by'  => null,
            ],
            [
                'name'        => 'Fuso Wingbox',
                'slug'        => 'fuso',
                'description' => 'Fuso wingbox hadir untuk kebutuhan distribusi skala besar dengan bak tertutup yang memberikan proteksi penuh terhadap cuaca dan risiko pencurian. Ideal untuk pengiriman barang bernilai tinggi antar kota dan antar provinsi.',
                'order'       => 3,
                'is_active'   => true,
                'created_by'  => null,
                'updated_by'  => null,
            ],
            [
                'name'        => 'Tronton Wingbox',
                'slug'        => 'tronton',
                'description' => 'Armada terbesar kami dengan kapasitas angkut hingga 30 ton. Dilengkapi bak tertutup model wingbox untuk proteksi maksimal dari cuaca dan risiko pencurian selama perjalanan panjang lintas pulau ke seluruh Indonesia.',
                'order'       => 4,
                'is_active'   => true,
                'created_by'  => null,
                'updated_by'  => null,
            ],
        ];

        foreach ($categories as $category) {
            FleetCategory::create($category);
        }
    }
}
