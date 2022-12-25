<?php

namespace Database\Seeders;

use App\Models\JenisHubungan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisHubunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisHubungan::insert([
            ['name' => 'kakek/nenek'],
            ['name' => 'paman/bibi'],
            ['name' => 'kakak'],
            ['name' => 'anak asuh'],
        ]);
    }
}
