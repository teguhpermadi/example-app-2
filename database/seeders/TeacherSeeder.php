<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->has(Teacher::factory() // setiap user memiliki data teacher
                ->state(function (array $attributes, User $user) {
                    return [
                        'nama_lengkap' => $user->name, // ubah nama lengkap sesuai dengan nama user
                        'nama_panggilan' => strtok($user->name, ' '), // ubah nama panggilan sesuai dengan kata pertama nama lengkap user
                    ];
            })
        )->create();
    }
}
