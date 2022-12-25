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
        Schema::create('teachers', function (Blueprint $table) {
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
            $table->foreignId('status_perkawinan')->nullable()->references('id')->on('jenis_perkawinans');
            $table->string('nama_pasangan')->nullable();
            $table->foreignId('status_pegawai')->nullable()->references('id')->on('jenis_pegawais');
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
        Schema::dropIfExists('teachers');
    }
};
