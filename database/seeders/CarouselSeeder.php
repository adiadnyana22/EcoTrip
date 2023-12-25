<?php

namespace Database\Seeders;

use App\Models\Carousel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carousel::create([
            'picture' => 'homeBanner1.png',
            'link' => 'http://127.0.0.1:8000/campaign'
        ]);

        Carousel::create([
            'picture' => 'homeBanner2.png',
            'link' => 'http://127.0.0.1:8000/wisata/2'
        ]);
    }
}
