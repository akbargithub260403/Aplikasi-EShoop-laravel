<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table    = 'tb_pembayaran';

    protected $fillable = ['produk_id','nama_pemesan','email_pemesan','status_pesanan','nama_barang','harga_barang','jumlah_barang','ukuran_barang','total_pembayaran','alamat_pemesan'];
}
