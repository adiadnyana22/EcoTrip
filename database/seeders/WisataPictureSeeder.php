<?php

namespace Database\Seeders;

use App\Models\WisataPicture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WisataPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WisataPicture::create([
           'wisata_id' => 1,
           'picture' => 'coban2.png'
        ]);

        WisataPicture::create([
            'wisata_id' => 1,
            'picture' => 'coban3.png'
        ]);

        WisataPicture::create([
            'wisata_id' => 1,
            'picture' => 'coban4.png'
        ]);

        WisataPicture::create([
            'wisata_id' => 1,
            'picture' => 'coban5.png'
        ]);

        WisataPicture::create([
            'wisata_id' => 2,
            'picture' => 'bromo2.png'
        ]);

        WisataPicture::create([
            'wisata_id' => 2,
            'picture' => 'bromo3.png'
        ]);
    }
}
