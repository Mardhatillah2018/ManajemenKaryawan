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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->char('nik',18);
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('email')->unique();
            $table->string('nohp');
            $table->date('tgl_masuk');
            $table->foreignId('departemen_id');
            $table->foreignId('jabatan_id');
            $table->text('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
