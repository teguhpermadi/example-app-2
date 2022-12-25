<?php

namespace Database\Seeders;

use App\Models\JenisPenghasilan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPenghasilanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisPenghasilan::insert([
            ['name' => 'lebih dari 5.000.000'],
            ['name' => '3.000.000 - 5.000.000'],
            ['name' => '2.000.000 - 3.000.000'],
            ['name' => '1.000.000 - 2.000.000'],
            ['name' => '500.000 - 1.000.000'],
            ['name' => 'kurang dari 500.000'],
            ['name' => 'tidak berpenghasilan'],
        ]);
    }
}
