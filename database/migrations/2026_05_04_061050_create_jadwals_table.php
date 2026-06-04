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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id('jadwalId');
            $table->string('hari', 6)->nullable();
            $table->char('waktu', 11)->default('07:30-10:00');
            $table->char('kodeMk', 6)->nullable();
            $table->char('grup', 1)->default('A');
            $table->char('nik', 7)->nullable();
            $table->string('ruang', 25)->nullable();

            $table->foreign('kodeMk')
                ->references('kodeMk')->on('matakuliah')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('nik')
                ->references('nik')->on('dosen')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
