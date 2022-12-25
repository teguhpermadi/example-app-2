<?php

namespace Database\Seeders;

use App\Models\JenisStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisStatus::insert([
            ['name' => 'masih hidup'],
            ['name' => 'meninggal dunia'],
        ]);
    }
}
