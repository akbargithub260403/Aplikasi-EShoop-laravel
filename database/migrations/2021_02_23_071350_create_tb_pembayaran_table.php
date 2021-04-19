<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('produk_id');
            $table->String('nama_pemesan',255);
            $table->String('email_pemesan',255);
            $table->String('status_pesanan',255);
            $table->String('nama_barang',255);
            $table->bigInteger('harga_barang');
            $table->bigInteger('jumlah_barang');
            $table->String('ukuran_barang',255);
            $table->bigInteger('total_pembayaran');
            $table->text('alamat_pemesan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pembayaran');
    }
}
