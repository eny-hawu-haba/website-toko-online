<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $outdatedSampleProducts = [
            'Tunik Floral',
            'Blouse Satin',
            'Cardigan Rajut',
            'Kemeja Linen Pria',
            'Kaos Oversize',
            'Celana Kulot',
            'Rok Plisket',
            'Jaket Denim',
            'Dress Midi',
            'Hoodie Basic',
            'Blazer Kasual',
            'Rok Midi Denim',
        ];

        Product::whereIn('name', $outdatedSampleProducts)->delete();

        $products = [
            [
                'name' => 'Blazer Formal Cokelat',
                'category' => 'Outerwear',
                'description' => 'Blazer formal warna cokelat dengan potongan rapi untuk kerja dan acara resmi.',
                'price' => 289000,
                'stock' => 8,
                'image' => 'blazer.jpg',
            ],
            [
                'name' => 'Hoodie Hitam Pullover',
                'category' => 'Outerwear',
                'description' => 'Hoodie pullover hitam yang nyaman untuk gaya santai sehari-hari.',
                'price' => 199000,
                'stock' => 15,
                'image' => 'hoodie.jpg',
            ],
            [
                'name' => 'Jaket Kulit Wanita',
                'category' => 'Outerwear',
                'description' => 'Jaket kulit hitam bergaya kasual, dipadukan dengan celana denim.',
                'price' => 275000,
                'stock' => 9,
                'image' => 'jaket.jpg',
            ],
            [
                'name' => 'Celana Jeans Cargo',
                'category' => 'Celana',
                'description' => 'Celana jeans biru model cargo dengan saku samping dan potongan kasual.',
                'price' => 219000,
                'stock' => 10,
                'image' => 'jeans.jpg',
            ],
            [
                'name' => 'Rok Polkadot Panjang',
                'category' => 'Rok',
                'description' => 'Rok panjang merah bermotif polkadot dengan detail kancing di bagian depan.',
                'price' => 159000,
                'stock' => 12,
                'image' => 'rok.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['name' => $product['name']],
                [...$product, 'is_active' => true],
            );
        }
    }
}
