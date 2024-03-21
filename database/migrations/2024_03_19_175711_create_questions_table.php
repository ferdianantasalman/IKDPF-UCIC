<?php

use App\Models\User;
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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(User::class)->constrained()->cascadeOnUpdate();
            $table->longText('question_text');
            $table->string('pelaksanaan');
            $table->string('tahun_akademik');
            $table->enum('tipe', ['jawaban', 'pilihan']);
            $table->enum('status', ['atasan', 'mahasiswa']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};