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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('nip')->unique()->nullable();
            $table->string('name')->unique();
            $table->string('foto')->nullable();
            $table->integer('no_sertifikat')->nullable();
            $table->string('data_sertifikat')->nullable();
            $table->integer('nidn')->unique()->nullable();
            $table->date('tgl_nidn')->nullable();
            $table->string('prodi')->nullable();
            $table->string('fungsional')->nullable();
            $table->date('tgl_fungsional')->nullable();
            $table->string('golongan')->nullable();
            $table->date('tgl_golongan')->nullable();
            $table->string('pendidikan')->nullable();
            $table->enum('role', ['admin', 'rektorat', 'fakultas', 'prodi', 'dosen']);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
