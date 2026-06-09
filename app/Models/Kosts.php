<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable('user_id', 'nama_kosts', 'alamat', 'jumlah_kamar')]

class Kosts extends Model
{
    /** @use HasFactory<\Database\Factories\KostsFactory> */
    protected $table = 'tb_kosts';
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    use HasFactory;
}
