<?php

use App\Models\Semester;
use App\Models\TahunAkademik;
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
        Schema::create('kinerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnUpdate();
            $table->string('jenis_kegiatan');
            $table->string('data_pendukung');
            $table->integer('sks');
            $table->foreignIdFor(Semester::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(TahunAkademik::class)->constrained()->cascadeOnUpdate();
            $table->enum('status', ['pendidikan', 'penelitian', 'pengabdian', 'penunjang']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kinerjas');
    }
};
