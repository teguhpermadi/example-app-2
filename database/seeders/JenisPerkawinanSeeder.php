<?php

namespace Database\Seeders;

use App\Models\JenisPerkawinan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPerkawinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisPerkawinan::insert([
            ['name' => 'belum menikah'],
            ['name' => 'menikah'],
            ['name' => 'janda'],
            ['name' => 'duda'],
        ]);
    }
}
