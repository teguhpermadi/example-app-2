<?php

namespace Database\Seeders;

use App\Models\JenisPegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisPegawai::insert([
            ['name' => 'pns'],
            ['name' => 'guru tetap yayasan'],
            ['name' => 'pegawai tetap yayasan'],
            ['name' => 'guru tidak tetap'],
            ['name' => 'pegawai tidak tetap'],
        ]);
    }
}
