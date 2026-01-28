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
        Schema::table('events', function (Blueprint $table) {
            // Hapus kolom lokasi lama
            $table->dropColumn('lokasi');
            
            // Tambah kolom location_id sebagai foreign key
            $table->foreignId('location_id')->nullable()->after('deskripsi')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            // Kembalikan kolom lokasi
            $table->string('lokasi')->after('deskripsi');
            
            // Hapus kolom location_id
            $table->dropForeign(['location_id']);
            $table->dropColumn('location_id');
        });
    }
};
