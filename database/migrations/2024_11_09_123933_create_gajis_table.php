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
        Schema::create('gajis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained('karyawans')->onDelete('cascade');
            $table->foreignId('jabatan_id')->constrained('jabatans')->onDelete('cascade');
            $table->foreignId('departemen_id')->constrained('departemens')->onDelete('cascade');
            $table->integer('bonus')->default(0);
            $table->integer('potongan')->default(0);
            $table->integer('total_gaji');
            $table->date('bulan_tahun');
            $table->enum('status', ['Diterima', 'Belum Diterima'])->default('Belum Diterima');
            $table->timestamps();  // Timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gajis');
    }
};
