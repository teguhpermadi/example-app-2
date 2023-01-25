<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Laravolt\Indonesia\Seeds\CitiesSeeder;
use Laravolt\Indonesia\Seeds\VillagesSeeder;
use Laravolt\Indonesia\Seeds\DistrictsSeeder;
use Laravolt\Indonesia\Seeds\ProvincesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            ProvincesSeeder::class,
            CitiesSeeder::class,
            DistrictsSeeder::class,
            VillagesSeeder::class,
            JenisAgamaSeeder::class,
            JenisHubunganSeeder::class,
            JenisPekerjaanSeeder::class,
            JenisPendidikanSeeder::class,
            JenisPenghasilanSeeder::class,
            JenisStatusSeeder::class,
            JenisPegawaiSeeder::class,
            StudentSeeder::class,
            TeacherSeeder::class,
            UserSeeder::class,
        ]);
    }
}
