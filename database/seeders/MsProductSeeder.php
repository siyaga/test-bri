<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\MsProduct;
use Faker\Factory as Faker;

class MsProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        $categories = ['Laptop', 'Mouse', 'Keyboard Mechanik', 'Monitor', 'Meja Kerja', 'Kursi Ergonomis', 'Lemari', 'Kacamata Anti Radiasi', 'Jam Tangan Pintar', 'Sepatu Lari', 'Tas Ransel', 'Jaket', 'Headset Gaming', 'Microphone'];
        $brands = ['Asus', 'Logitech', 'Razer', 'Ikea', 'Eiger', 'Casio', 'Nike', 'Adidas', 'Erigo', 'Lenovo', 'Samsung', 'Xiaomi', 'Oppo', 'Fantech'];
        $series = ['Pro', 'Max', 'Ultra', 'Gaming', 'Classic', 'Modern', 'Basic', 'Premium', 'Elite', 'Lite', 'Plus'];

        // Generate 50 random products yang terlihat nyata
        for ($i = 0; $i < 50; $i++) {
            $cat = $faker->randomElement($categories);
            $brand = $faker->randomElement($brands);
            $seri = $faker->randomElement($series);
            $version = $faker->numberBetween(1, 15);
            
            MsProduct::create([
                'namaproduct' => "$cat $brand $seri $version",
                'qty' => $faker->numberBetween(5, 100),
            ]);
        }
    }
}

