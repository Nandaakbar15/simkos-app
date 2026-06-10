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
        Schema::create('tb_bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_id')->references('id')->on('tb_rentals');

            $table->tinyInteger('bulan');
            $table->year('tahun');

            $table->decimal('nominal', 12, 2);

            $table->date('jatuh_tempo');

            $table->enum('status', [
                'belum_bayar',
                'lunas',
                'terlambat'
            ])->default('belum_bayar');

            $table->unique([
                'rental_id',
                'bulan',
                'tahun'
            ]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_bills');
    }
};
