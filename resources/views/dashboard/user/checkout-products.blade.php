@extends('layouts.master')
@section('title','Checkout Products')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div>
        <!--/breadcrums-->

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{ asset('images/shop/'.$cart->produk->gambar)}}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$cart->produk->nama_barang}}</a></h4>
                        </td>
                        <td class="cart_price">
                            <p>Rp.{{$cart->produk->harga_barang}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <input class="cart_quantity_input" readonly type="text" name="quantity" value="1"
                                    autocomplete="off" size="2">
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">Rp.@php echo $cart->produk->harga_barang * $cart->jumlah_barang;
                                @endphp</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-8">
                    <div class="bill-to">
                        <p>Pembayaran</p>
                        <div class="form-one">
                            <form method="POST" action="{{'/E-Shoop/Pembayaran/'.$cart->produk_id.'/'.Auth::user()->name}}">
                            @csrf
                            <label for="">Nama Pemesan</label>
                                <input type="text" name="nama_pemesan" readonly value="{{Auth::user()->name}}" placeholder="Company Name">
                            <label for="">Email Pemesan</label>
                                <input type="email" name="email_pemesan" value="{{Auth::user()->email}}">
                            <label for="">Nama Barang</label>
                                <input type="text" name="nama_barang" readonly value="{{$cart->produk->nama_barang}}">
                            <label for="">Jumlah Barang</label>
                                <input type="text" name="jumlah_barang" readonly value="{{$cart->jumlah_barang}}">
                            <label for="">Ukuran Barang</label>
                                <input type="text" name="ukuran_barang" readonly value="{{$cart->ukuran_barang}}">
                            <label for="">Harga Barang</label>
                                <input type="text" name="harga_barang" readonly value="{{$cart->produk->harga_barang}}">
                            <label for="">Total Pembayaran</label>
                                <input type="text" name="total_pembayaran" readonly value="@php echo $cart->produk->harga_barang * $cart->jumlah_barang;
                                @endphp">
                            <label for="">Deskripsi Alamat</label>
                            <textarea name="alamat_pemesan" placeholder="Deskripsikan alamat pengiriman barang anda"
                            rows="16"></textarea>
                            <hr>
                            <button type="submit" class="btn btn-primary">Checkout</button>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#cart_items-->
@endsection
