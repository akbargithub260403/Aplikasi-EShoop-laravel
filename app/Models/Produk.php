<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table    = 'tb_produk';

    protected $fillable = ['kategori_id','nama_barang','harga_barang','jumlah_barang','ukuran_barang','gambar','deskripsi'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
