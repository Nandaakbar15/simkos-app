<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
#[Fillable('tenant_id', 'room_id', 'tgl_masuk', 'tgl_keluar', 'harga_sewa', 'deposit', 'status')]

class Rentals extends Model
{
    /** @use HasFactory<\Database\Factories\RentalsFactory> */
    protected $table = 'tb_rentals';
    protected $primaryKey = 'id';

    public function tenants()
    {
        return $this->belongsTo(Tenants::class, 'tenant_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function bills()
    {
        return $this->hasMany(Bills::class, 'rental_id');
    }

    use HasFactory;
}
