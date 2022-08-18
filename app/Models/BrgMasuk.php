<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrgMasuk extends Model
{
    protected $table = 'brg_masuk';

    protected $fillable = [
        'no_brg_masuk',
        'id_barang',
        'tgl_masuk',
        'jml_barang_masuk',
        'created_at',
        'updated_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
