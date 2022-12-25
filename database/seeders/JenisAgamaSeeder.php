<?php

namespace Database\Seeders;

use App\Models\JenisAgama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisAgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisAgama::insert([
            ['name' => 'islam'],
            ['name' => 'kristen'],
            ['name' => 'katholik'],
            ['name' => 'hindu'],
            ['name' => 'budha'],
            ['name' => 'konghuchu'],
        ]);
    }
}
