<?php

namespace Database\Seeders;

use App\Models\Sysparam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SysparamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sysparam::create([
            'param' => 'ecotrip_desc',
            'value' => 'EcoTrip merupakan usaha berbasis digital yang bergerak dalam bidang online travel agent (OTA). Kehadiran EcoTrip berupaya sebagai pihak yang menjembatani para wisatawan dan pengelola tempat wisata untuk dapat saling berusaha menerapkan konsep ekowisata demi terciptanya pelestarian lingkungan alam dan tempat wisata yang berkelanjutan. Ecotrip menawarkan berbagai jenis paket perjalanan ekowisata private trip maupun open trip. Sebagai penunjang efektifitas penerapan ekowisata, EcoTrip menghadirkan konsep EcoWaste yaitu penerapan sampah yang berfungsi untuk meningkatkan edukasi pengetahuan customer terkait penerapan dan manajemen pengelolaan sampah mandiri wisatawan.'
        ]);
    }
}
