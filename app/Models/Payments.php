<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
#[Fillable('bill_id', 'tgl_bayar', 'jumlah_bayar', 'metode_pembayaran', 'bukti_pembayaran', 'catatan')]
class Payments extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentsFactory> */
    protected $table = 'tb_payments';
    protected $primaryKey = 'id';

    public function bills()
    {
        return $this->belongsTo(Bills::class, 'bill_id');
    }

    use HasFactory;
}
