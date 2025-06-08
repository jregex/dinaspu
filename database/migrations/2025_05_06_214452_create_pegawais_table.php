<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jabatan_id');
            $table->string('nip', 25)->nullable();
            $table->string('nama')->nullable();
            $table->string('golongan', 50)->nullable();
            $table->date('tmt1')->nullable();
            $table->date('tmt2')->nullable();
            $table->date('masa_kerja')->nullable();
            $table->string('nama_pelatihan')->nullable();
            $table->year('lulus_pelatihan')->nullable();
            $table->integer('lama_kerja')->nullable();
            $table->string('pendidikan')->nullable();
            $table->year('thn_lulus')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('image')->default('default.webp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
