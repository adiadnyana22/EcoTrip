<?php

namespace Database\Seeders;

use App\Models\Wisata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wisata::create([
            'name' => 'Air Terjun Coban Rondo',
            'picture' => 'coban1.png',
            'local_price' => 15000,
            'foreign_price' => 25000,
            'location' => 'Malang, Jawa Timur',
            'description' => 'lorem',
            'activity' => 'lorem, lorem, lorem, lorem',
            'includes' => 'lorem, lorem, lorem, lorem'
        ]);

        Wisata::create([
            'name' => 'Gunung Bromo',
            'picture' => 'bromo1.png',
            'local_price' => 50000,
            'foreign_price' => 100000,
            'location' => 'Malang, Jawa Timur',
            'description' => 'lorem1',
            'activity' => 'lorem1, lorem1, lorem1, lorem1',
            'includes' => 'lorem1, lorem1, lorem1, lorem1'
        ]);
    }
}
