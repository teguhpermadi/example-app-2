<?php

namespace Database\Seeders;

use App\Models\JenisPekerjaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisPekerjaan::insert([
            ['name' => 'Pegawai Swasta'],
            ['name' => 'Wiraswasta'],
            ['name' => 'TNI/Polisi'],
            ['name' => 'Guru/Dosen'],
            ['name' => 'Dokter/Bidan/Perawat'],
            ['name' => 'Pengacara/Jaksa/Hakim/Notaris'],
            ['name' => 'Seniman/Sejenisnya'],
            ['name' => 'Pilot/Pramugari'],
            ['name' => 'Pedagang'],
            ['name' => 'Petani/Peternak'],
            ['name' => 'Nelayan'],
            ['name' => 'Buruh Tani)'],
            ['name' => 'Buruh Pabrik)'],
            ['name' => 'Buruh Bangunan)'],
            ['name' => 'Sopir/Masinis/Kondektur'],
            ['name' => 'Politikus'],
            ['name' => 'Pensiunan'],
            ['name' => 'Lainnya'],
            ['name' => 'Tidak Bekerja'],
        ]);
    }
}
