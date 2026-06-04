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
        Schema::create('krskhs', function (Blueprint $table) {
            $table->id('idKrs');
            $table->unsignedBigInteger('noReg')->nullable();
            $table->unsignedBigInteger('jadwalId')->nullable();
            $table->char('nilai', 2)->default('A');

            $table->foreign('noReg')
                ->references('noReg')->on('registrasi')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('jadwalId')
                ->references('jadwalId')->on('jadwal')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('krskhs');
    }
};
