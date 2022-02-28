<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'pemilik', 'nama_barang', 'category_id', 'harga', 'deskripsi', 'foto', 'jenis', 'status'
    ];

    public function Kategori()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function Pemilik()
    {
        return $this->belongsTo(User::class, 'pemilik');
    }
}
