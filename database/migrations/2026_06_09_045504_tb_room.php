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
        Schema::create('tb_room', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kost_id')->references('id')->on('tb_kosts');
            $table->string('nomor_kamar');
            $table->integer('harga_bulanan');
            $table->enum('status', ['kosong', 'terisi', 'maintenance']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_room');
    }
};
