<?php

namespace Database\Seeders;

use App\Models\Insight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class InsightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Insight::create([
            'title' => 'Pentingnya Peran Ekowisata Untuk Keberlanjutan Pariwisata di Indonesia',
            'picture' => 'bromo1.png',
            'content' => 'Mungkin ada yang belum familiar dengan kata dan istilah dari “ekowisata”. Sebenarnya apa itu ekowisata? 
            “Ekowisata merupakan perjalanan wisata yang berfokus pada sustainability dengan memberikan pengalaman unik dan bermakna melalui penerapan praktik perjalanan wisata bertanggung jawab pada destinasi alam budaya dan mendukung ekonomi lokal.”
            Keberlanjutan tempat wisata itu penting banget loh!! Caranya bagi wisatawan untuk berkontribusi bagi keberlanjutan ekowisata gimana ya? Oke jangan bingung, mari kita spill caranya. Simple banget sebenernya tapi sering kelupaan bagi kita para wisatawan dalam melakukan perjalan wisata, yaitu “meminimalisir dampak negatif terhadap lingkungan”.
            Dampak lingkungan saat melakukan perjalan wisata itu penting bgt loh!!!! Karena tiap hal yang kita lakukan selama berwisata dapat berdampak terhadap lingkungan dan nantinya dapat mempengaruhi tingkat keindahan destinasi wisata. Jadi penting banget bagi wisatawan untuk dapat berkontribusi menjaga keindahan tempat wisata yang nantinya dapat kita wariskan ke cucu-cicit kita nanti.
            Caranya bagaimana? Caranya mudah dan bisa kita mulai dengan diri kita sendiri, yaitu dengan melakukan pengelolaan sampah secara mandiri dari diri sendiri, seperti tidak membuang sampah sembarangan dan memiliki kemauan dan kesadaran tinggi untuk membuang sampah pada tempatnya.
            Pernah ga sih kalian kepikiran kalau sampah yang kalian hasilkan selama berwisata itu  ternyata memiliki nilai tersendiri. What? Maksudnya bernilai gimana yak an itu Cuma sampah? Eits jangan bingung. Dengan melakukan perjalan ekowisata dengan menggunakan EcoTrip, sampah kalian tidak hanya menjadi sampah saja tapi bisa memiliki nilai sendiri yang bisa kamu tukarkan menjadi poin reward yang apabila kamu kumpulkan bisa kamu tukarkan menjadi potongan diskon saat melakukan pembelian tiket wisata kedepannya. Caranya mudah kok, nantinya kamu bisa gunakan fitur ecowaste yang ada di website ecotrip saat kamu berwisata sehingga melalui fitur ini dapat memudahkan kamu melakukan pengelolaan sampah kamu secara mandiri.
            Ecowaste link
            Wah jadi berwisata sekaligus meminimalisir dampak lingkungan itu mudah dan menyenangkan bukan? Yuk gunakan ecotrip dan mari berkontribusi terhadap lingkungan dengan bertanggung jawab pada sampah wisata yang kita miliki.',
            'date' => Carbon::parse('2023-11-24'),
         ]);

         Insight::create([
            'title' => 'Pentingnya Peran Ekowisata Untuk Keberlanjutan Pariwisata di Indonesia 2',
            'picture' => 'coban1.png',
            'content' => 'Mungkin ada yang belum familiar dengan kata dan istilah dari “ekowisata”. Sebenarnya apa itu ekowisata? 
            “Ekowisata merupakan perjalanan wisata yang berfokus pada sustainability dengan memberikan pengalaman unik dan bermakna melalui penerapan praktik perjalanan wisata bertanggung jawab pada destinasi alam budaya dan mendukung ekonomi lokal.”
            Keberlanjutan tempat wisata itu penting banget loh!! Caranya bagi wisatawan untuk berkontribusi bagi keberlanjutan ekowisata gimana ya? Oke jangan bingung, mari kita spill caranya. Simple banget sebenernya tapi sering kelupaan bagi kita para wisatawan dalam melakukan perjalan wisata, yaitu “meminimalisir dampak negatif terhadap lingkungan”.
            Dampak lingkungan saat melakukan perjalan wisata itu penting bgt loh!!!! Karena tiap hal yang kita lakukan selama berwisata dapat berdampak terhadap lingkungan dan nantinya dapat mempengaruhi tingkat keindahan destinasi wisata. Jadi penting banget bagi wisatawan untuk dapat berkontribusi menjaga keindahan tempat wisata yang nantinya dapat kita wariskan ke cucu-cicit kita nanti.
            Caranya bagaimana? Caranya mudah dan bisa kita mulai dengan diri kita sendiri, yaitu dengan melakukan pengelolaan sampah secara mandiri dari diri sendiri, seperti tidak membuang sampah sembarangan dan memiliki kemauan dan kesadaran tinggi untuk membuang sampah pada tempatnya.
            Pernah ga sih kalian kepikiran kalau sampah yang kalian hasilkan selama berwisata itu  ternyata memiliki nilai tersendiri. What? Maksudnya bernilai gimana yak an itu Cuma sampah? Eits jangan bingung. Dengan melakukan perjalan ekowisata dengan menggunakan EcoTrip, sampah kalian tidak hanya menjadi sampah saja tapi bisa memiliki nilai sendiri yang bisa kamu tukarkan menjadi poin reward yang apabila kamu kumpulkan bisa kamu tukarkan menjadi potongan diskon saat melakukan pembelian tiket wisata kedepannya. Caranya mudah kok, nantinya kamu bisa gunakan fitur ecowaste yang ada di website ecotrip saat kamu berwisata sehingga melalui fitur ini dapat memudahkan kamu melakukan pengelolaan sampah kamu secara mandiri.
            Ecowaste link
            Wah jadi berwisata sekaligus meminimalisir dampak lingkungan itu mudah dan menyenangkan bukan? Yuk gunakan ecotrip dan mari berkontribusi terhadap lingkungan dengan bertanggung jawab pada sampah wisata yang kita miliki.',
            'date' => Carbon::parse('2023-11-24'),
         ]);
    }
}
