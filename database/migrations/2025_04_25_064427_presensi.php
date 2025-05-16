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
        Schema::create('presensi', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('npm', 10);
            $table->date('tgl_absensi');
            $table->time('jam_in');
            $table->time('jam_out');
            $table->text('foto_in',);
            $table->text('foto_out',);
            $table->text('location',);

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
