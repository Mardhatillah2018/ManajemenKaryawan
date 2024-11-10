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
        Schema::table('karyawans', function (Blueprint $table) {
            // Tambahkan foreign keys dengan cascade delete
            $table->foreign('departemen_id')->references('id')->on('departemens')->onDelete('cascade');
            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('karyawans', function (Blueprint $table) {
            $table->dropForeign(['departemen_id']);
            $table->dropForeign(['jabatan_id']);
        });
    }
};
