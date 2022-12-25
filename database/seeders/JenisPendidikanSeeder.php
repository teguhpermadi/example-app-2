<?php

namespace Database\Seeders;

use App\Models\JenisPendidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisPendidikan::insert([
            ['name' => 'Srata 1'],
            ['name' => 'Srata 2'],
            ['name' => 'Srata 3'],
            ['name' => 'Diploma'],
            ['name' => 'SMA sederajat'],
            ['name' => 'SMP sederajat'],
            ['name' => 'SD sederajat'],
            ['name' => 'Tidak sekolah'],
        ]);
    }
}
