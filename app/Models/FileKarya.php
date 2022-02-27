<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileKarya extends Model
{
    use HasFactory;
    protected $fillable = [
        'code', 'barang_id', 'file', 'pemilik'
    ];

    public function Barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
