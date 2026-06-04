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
        Schema::table('users', function (Blueprint $table) {
            // tambah nim
            $table->string('nim')->unique()->nullable()->after('id');
            // tambah role
            $table->string('role')->default('mahasiswa')->after('password');

            // foreign key ke tabel mahasiswa
            $table->foreign('nim')
            ->references('nim')
            ->on('mahasiswa')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['nim']);
            $table->dropColumn('nim');
            $table->dropColumn('role');
        });
    }
};

