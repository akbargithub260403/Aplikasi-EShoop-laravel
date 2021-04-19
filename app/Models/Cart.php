<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table      = 'tb_cart';

    protected $fillable   = ['user_id','produk_id','ukuran_barang','jumlah_barang'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

}
