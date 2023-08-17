<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Voucher::create([
            'name' => 'Diskon Pengguna Baru',
            'description' => 'Diskon 10% s/d 20k',
            'percentage' => 10,
            'max_nominal' => 20000,
        ]);

        Voucher::create([
            'name' => 'Voucher Hari Kemerdekaan',
            'description' => 'Diskon 5% s/d 10k',
            'percentage' => 5,
            'max_nominal' => 10000,
        ]);

        Voucher::create([
            'name' => 'Voucher Spesial Untuk Anda',
            'description' => 'Diskon 25% s/d 50k',
            'percentage' => 25,
            'max_nominal' => 50000,
        ]);
    }
}
