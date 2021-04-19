@extends('layouts.master')
@section('title','Cart Products')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
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
                        <td></td>
                    </tr>
                </thead>
                <tbody>

                    @foreach($cart as $ct)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{ asset('images/shop/'.$ct->produk->gambar)}}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$ct->produk->nama_barang}}</a></h4>
                            <p>Deskripsi: {{$ct->produk->deskripsi}}</p>
                        </td>
                        <td class="cart_price">
                            <p>Rp.{{$ct->produk->harga_barang}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up"
                                    href="{{'/E-Shoop/Up/Cart/'.$ct->user_id.'/'.$ct->produk_id}}"> + </a>
                                <input class="cart_quantity_input" type="text" readonly name="quantity"
                                    value="{{$ct->jumlah_barang}}" autocomplete="off" size="2">
                                <a class="cart_quantity_down"
                                    href="{{'/E-Shoop/Down/Cart/'.$ct->user_id.'/'.$ct->produk_id}}"> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">Rp.@php echo $ct->produk->harga_barang * $ct->jumlah_barang;
                                @endphp</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{'/E-Shoop/Delete/'.$ct->id.'/Cart'}}"><i
                                    class="fa fa-times"></i></a>
                        </td>
                        <td>
                            <a class="btn btn-info btn-xs" href="{{'/E-Shoop/Checkout/'.$ct->id.'/Cart'}}"><i
                                    class="fa fa-arrow"></i>Checkout</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<!--/#cart_items-->

@endsection
