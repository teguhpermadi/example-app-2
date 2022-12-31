<?php

namespace Database\Factories;

use App\Models\JenisAgama;
use App\Models\JenisHubungan;
use App\Models\JenisPendidikan;
use App\Models\JenisPenghasilan;
use App\Models\JenisStatus;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_lengkap' => fake()->name(),
            'nama_panggilan' => fake()->firstName(),
            'jenis_kelamin' => fake()->randomElement(['l', 'p']),
            'tempat_lahir' => \Indonesia::allCities()->random()->id,
            'tanggal_lahir' => fake()->date('d/m/Y'),
            'alamat' => fake()->address(),
            'village_id' => \Indonesia::allVillages()->random()->id,
            'kodepos' => fake()->postcode(),
            'nis' => fake()->numerify('####'),
            'nisn' => fake()->numerify('##########'),
            'nik' => fake()->numerify('################'),
            'nkk' => fake()->numerify('################'),
            'status_ayah' => fake()->randomElement(JenisStatus::all()->pluck('id')),
            // 'nik_ayah' => fake()->numerify('################'),
            'nama_ayah' => fake()->name(),
            'agama_ayah' => fake()->randomElement(JenisAgama::all()->pluck('id')),
            'pendidikan_ayah' => fake()->randomElement(JenisPendidikan::all()->pluck('id')),
            // 'pekerjaan_ayah' => fake()->randomElement(JenisPendidikan::all()->pluck('id')),
            // 'penghasilan_ayah' => fake()->randomElement(JenisPenghasilan::all()->pluck('id')),
            // 'telp_ayah' => fake()->phoneNumber(),
            'status_ibu' => fake()->randomElement(JenisStatus::all()->pluck('id')),
            // 'nik_ibu' => fake()->numerify('################'),
            'nama_ibu' => fake()->name(),
            'agama_ibu' => fake()->randomElement(JenisAgama::all()->pluck('id')),
            'pendidikan_ibu' => fake()->randomElement(JenisPendidikan::all()->pluck('id')),
            // 'pekerjaan_ibu' => fake()->randomElement(JenisPendidikan::all()->pluck('id')),
            // 'penghasilan_ibu' => fake()->randomElement(JenisPenghasilan::all()->pluck('id')),
            // 'telp_ibu' => fake()->phoneNumber(),
            'hubungan_wali' => fake()->randomElement(JenisHubungan::all()->pluck('id')),
            'nik_wali' => fake()->numerify('################'),
            'nama_wali' => fake()->name(),
            'agama_wali' => fake()->randomElement(JenisAgama::all()->pluck('id')),
            'pendidikan_wali' => fake()->randomElement(JenisPendidikan::all()->pluck('id')),
            'pekerjaan_wali' => fake()->randomElement(JenisPendidikan::all()->pluck('id')),
            'penghasilan_wali' => fake()->randomElement(JenisPenghasilan::all()->pluck('id')),
            'telp_wali' => fake()->phoneNumber(),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Student $student) {
            // jika status ayah masih hidup generate datanya
            if($student->status_ayah == 1){
                $student->nik_ayah = fake()->numerify('################');
                $student->pekerjaan_ayah = fake()->randomElement(JenisPendidikan::all()->pluck('id'));
                $student->penghasilan_ayah = fake()->randomElement(JenisPenghasilan::all()->pluck('id'));
                $student->telp_ayah = fake()->phoneNumber();
            }

            // jika status ibu masih hidup generate datanya
            if($student->status_ibu == 1){
                $student->nik_ibu = fake()->numerify('################');
                $student->pekerjaan_ibu = fake()->randomElement(JenisPendidikan::all()->pluck('id'));
                $student->penghasilan_ibu = fake()->randomElement(JenisPenghasilan::all()->pluck('id'));
                $student->telp_ibu = fake()->phoneNumber();
            }
        })->afterCreating(function (Student $student, User $user) {
            // ubah data user guard kemudian simpan
            $user->guard = 'student';
            $user->guardable_id = $student->id;
            $user->guardable_type = Student::class;
            $user->save();
        });
    }
}
