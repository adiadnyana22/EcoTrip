<?php

namespace Database\Seeders;

use App\Models\MeetingPoint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeetingPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MeetingPoint::create([
           'title' => 'ICE BSD',
           'description' => 'Ini di ice bsd lur',
           'mapIframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63450.80634648271!2d106.67049415004877!3d-6.30630893356596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fb535f152305%3A0x34406ed8b098f478!2sIndonesia%20Convention%20Exhibition!5e0!3m2!1sid!2sid!4v1694706924837!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
        ]);

        MeetingPoint::create([
            'title' => 'BCA Foresta',
            'description' => 'Kantor BCA Forestaaaaaaaaaaaaa',
            'mapIframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9053.358769950511!2d106.63647697753925!3d-6.2939886595302985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fbad324beb1d%3A0x79365c65e8888048!2sWisma%20BCA%20Foresta!5e0!3m2!1sid!2sid!4v1694707093499!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
        ]);
    }
}
