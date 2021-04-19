@extends('layouts.master')
@section('title','Checkout Products')
@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Checkout</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Total Pembayaran</td>
                        <td class="quantity">Jumlah Barang</td>
                        <td class="quantity">Jumlah Barang</td>
                        <td class="total">Dapatkan Barang</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $dt)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{ asset('images/shop/'.$gambar)}}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$dt->nama_barang}}</a></h4>
                            <p>Ukuran : {{$dt->ukuran_barang}}</p>
                            <p>Nama Pemesan : {{$dt->nama_pemesan}}</p>
                            <p>Email Pemesan : {{$dt->email_pemesan}}</p>
                            <p>Alamat Pemesan : {{$dt->alamat_pemesan}}</p>
                        </td>
                        <td class="cart_price">
                            <p>Rp.{{$dt->total_pembayaran}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <input class="cart_quantity_input" type="text" readonly value="{{$dt->jumlah_barang}}"
                                    name="quantity" autocomplete="off" size="2">
                            </div>
                        </td>
                        <td class="cart_quantity">
                            @if($dt->status_pesanan == 'diproses')
                            <button class="btn btn-primary btn-xs">{{$dt->status_pesanan}}</button>
                            @elseif($dt->status_pesanan == 'dikemas')
                            <button class="btn btn-info btn-xs">{{$dt->status_pesanan}}</button>
                            @elseif($dt->status_pesanan == 'dikirim')
                            <button class="btn btn-danger btn-xs">{{$dt->status_pesanan}}</button>
                            @elseif($dt->status_pesanan == 'diterima')
                            <button class="btn btn-success btn-xs">{{$dt->status_pesanan}}</button>
                            @endif
                        </td>
                        <td class="cart_total">
                            <p>7 Hari Setelah Melakukan Checkout Barang</p>
                            <p>Tanggal Checkout : {{$dt->created_at}}</p>
                        </td>
                        @if($dt->status_pesanan == 'diproses')
                        <td>
                            <form action="{{'/Checkout/Produk/'.$dt->id.'/Cancel'}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Batalkan Pesanan</button>
                            </form>
                        </td>
                        @endif
                        @if($dt->status_pesanan == 'diterima')
                        <td>
                            <a class="btn btn-info btn-sm" href="">Ulas Barang Anda</a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<!--/#cart_items-->
<section id="do_action">
    <div class="container">
        <div class="heading">
            <p>Jika Status Barang Sudah Di Kemas Maka Pengiriman Barang Tidak Bisa Di Cancel.</p>
        </div>
    </div>
</section>
<!--/#do_action-->

@endsection
