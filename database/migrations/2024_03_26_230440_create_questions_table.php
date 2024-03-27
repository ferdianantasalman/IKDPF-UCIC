<?php

use App\Models\Semester;
use App\Models\TahunAkademik;
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
            $table->longText('question_text');
            $table->foreignIdFor(Semester::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(TahunAkademik::class)->constrained()->cascadeOnUpdate();
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
