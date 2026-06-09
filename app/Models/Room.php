<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable('kost_id', 'nomor_kamar', 'harga_bulanan', 'status')]

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    protected $table = 'tb_room';
    protected $primaryKey = 'id';

    public function kosts()
    {
        return $this->belongsTo(Kosts::class, 'kost_id');
    }

    use HasFactory;
}
