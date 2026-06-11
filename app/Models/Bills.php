<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
#[Fillable('rental_id', 'bulan', 'tahun', 'nominal', 'jatuh_tempo', 'status')]

class Bills extends Model
{
    /** @use HasFactory<\Database\Factories\BillsFactory> */
    protected $table = 'tb_bills';
    protected $primaryKey = 'id';

    public function rentals()
    {
        return $this->belongsTo(Rentals::class, 'rental_id');
    }

    public function payments()
    {
        return $this->hasMany(Payments::class, 'id');
    }

    use HasFactory;
}
