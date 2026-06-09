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
        Schema::create('tb_rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->references('id')->on('tb_tenants');
            $table->foreignId('room_id')->references('id')->on('tb_room');
            $table->date('tgl_masuk');
            $table->date('tgl_keluar');
            $table->integer('harga_sewa');
            $table->integer('deposit');
            $table->enum('status', ['aktif', 'selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_rentals');
    }
};
