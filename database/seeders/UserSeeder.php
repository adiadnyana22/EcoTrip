<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Adi Adnyana',
            'email' => 'adiadnyana22@gmail.com',
            'password' => Hash::make('admin'),
            'gender' => 'M',
            'telp' => '081246868369',
            'nationality' => 1,
            'dob' => new Carbon('2002-11-24'),
            'coin' => '999999999',
            'role_id' => 1
        ]);

        User::create([
            'name' => 'Visitor',
            'email' => 'visitor@gmail.com',
            'password' => Hash::make('visitor'),
            'gender' => 'F',
            'telp' => '08123456789',
            'nationality' => 0,
            'dob' => new Carbon('2001-11-24'),
            'coin' => '10000',
            'role_id' => 2
        ]);
    }
}
