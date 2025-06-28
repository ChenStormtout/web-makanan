<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Seblak Ceker Pedas',
                'category_id' => 1,
                'description' => 'Seblak dengan topping ceker dan kuah pedas khas Bandung.',
                'price' => 15000,
                'image' => 'seblak-ceker.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seblak Komplit Level 5',
                'category_id' => 1,
                'description' => 'Seblak isi kerupuk, bakso, sosis, makaroni, dan sayur. Pedas maksimal!',
                'price' => 18000,
                'image' => 'seblak-komplit.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bakso Aci Kuah Jeruk Limau',
                'category_id' => 1,
                'description' => 'Bakso aci kenyal dengan kuah segar limau dan sambal.',
                'price' => 14000,
                'image' => 'bakso-aci-limau.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bakso Aci Komplit',
                'category_id' => 1,
                'description' => 'Bakso aci, tahu, ceker, siomay, kuah pedas.',
                'price' => 17000,
                'image' => 'bakso-aci-komplit.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Es Teh Manis Jumbo',
                'category_id' => 2,
                'description' => 'Es teh manis segar ukuran jumbo.',
                'price' => 5000,
                'image' => 'es-teh.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Es Jeruk Segar',
                'category_id' => 2,
                'description' => 'Minuman jeruk asli tanpa pengawet.',
                'price' => 6000,
                'image' => 'es-jeruk.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
