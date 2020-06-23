<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon_siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pendaftaran');
            $table->string('nama_asli');
            $table->string('nama_panggilan');
            $table->string('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Khong Hu Cu']);
            $table->string('kelurahan');
            $table->string('alamat');
            $table->string('nisn');
            $table->string('nik');
            $table->string('no_kk');
            $table->string('no_hp');
            $table->string('sekolah_asal');
            $table->enum('status_sekolah', ['Negeri', 'Swasta']);
            $table->string('nomor_btq')->nullable();
            $table->enum('status', ['Diterima', 'Pending', 'Ditolak']);
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
        Schema::dropIfExists('calon_siswas');
    }
}
