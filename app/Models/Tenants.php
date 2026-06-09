<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable('nama', 'nik', 'no_hp', 'alamat', 'pekerjaan', 'foto_ktp')]

class Tenants extends Model
{
    /** @use HasFactory<\Database\Factories\TenantsFactory> */
    protected $table = 'tb_tenants';
    protected $primaryKey = 'id';
    use HasFactory;
}
