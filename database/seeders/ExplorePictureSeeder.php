<?php

namespace Database\Seeders;

use App\Models\ExplorePicture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExplorePictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExplorePicture::create([
            'explore_id' => 1,
            'picture' => 'coban2.png'
        ]);

        ExplorePicture::create([
            'explore_id' => 1,
            'picture' => 'coban3.png'
        ]);

        ExplorePicture::create([
            'explore_id' => 1,
            'picture' => 'coban4.png'
        ]);

        ExplorePicture::create([
            'explore_id' => 1,
            'picture' => 'coban5.png'
        ]);

        ExplorePicture::create([
            'explore_id' => 2,
            'picture' => 'bromo2.png'
        ]);

        ExplorePicture::create([
            'explore_id' => 2,
            'picture' => 'bromo3.png'
        ]);
    }
}
