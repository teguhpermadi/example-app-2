<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained();
            $table->string('nama_lengkap')->nullable();
            $table->string('nama_panggilan')->nullable();
            $table->enum('jenis_kelamin', ['l', 'p'])->nullable();
            $table->foreignId('tempat_lahir')->nullable()->references('id')->on(config('laravolt.indonesia.table_prefix') . 'cities');
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->foreignId('village_id')->nullable()->references('id')->on(config('laravolt.indonesia.table_prefix') . 'villages');
            $table->string('kodepos')->nullable();
            $table->string('nis')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nik')->nullable();
            $table->string('nkk')->nullable();
            $table->foreignId('status_ayah')->nullable()->references('id')->on('jenis_statuses');
            $table->string('nik_ayah')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->foreignId('agama_ayah')->nullable()->references('id')->on('jenis_agamas');
            $table->foreignId('pendidikan_ayah')->nullable()->references('id')->on('jenis_pendidikans');
            $table->foreignId('pekerjaan_ayah')->nullable()->references('id')->on('jenis_pekerjaans');
            $table->foreignId('penghasilan_ayah')->nullable()->references('id')->on('jenis_penghasilans');
            $table->string('telp_ayah')->nullable();
            $table->foreignId('status_ibu')->nullable()->references('id')->on('jenis_statuses');
            $table->string('nik_ibu')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->foreignId('agama_ibu')->nullable()->references('id')->on('jenis_agamas');
            $table->foreignId('pendidikan_ibu')->nullable()->references('id')->on('jenis_pendidikans');
            $table->foreignId('pekerjaan_ibu')->nullable()->references('id')->on('jenis_pekerjaans');
            $table->foreignId('penghasilan_ibu')->nullable()->references('id')->on('jenis_penghasilans');
            $table->string('telp_ibu')->nullable();
            $table->foreignId('hubungan_wali')->nullable()->references('id')->on('jenis_hubungans');
            $table->string('nik_wali')->nullable();
            $table->string('nama_wali')->nullable();
            $table->foreignId('agama_wali')->nullable()->references('id')->on('jenis_agamas');
            $table->foreignId('pendidikan_wali')->nullable()->references('id')->on('jenis_pendidikans');
            $table->foreignId('pekerjaan_wali')->nullable()->references('id')->on('jenis_pekerjaans');
            $table->foreignId('penghasilan_wali')->nullable()->references('id')->on('jenis_penghasilans');
            $table->string('telp_wali')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
