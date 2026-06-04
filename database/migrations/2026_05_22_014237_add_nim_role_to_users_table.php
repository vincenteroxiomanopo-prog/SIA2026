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
            // Tambah kolom nim dan role
            $table->string('nim')->unique()->nullable()->after('id');
            $table->string('role')->default('mahasiswa')->after('password');

            // Foreign key ke tabel mahasiswa
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
            // Hapus foreign key constraint
            $table->dropForeign(['nim']);
            
            // Hapus kolom sekaligus
            $table->dropColumn(['nim', 'role']);
        });
    }
};