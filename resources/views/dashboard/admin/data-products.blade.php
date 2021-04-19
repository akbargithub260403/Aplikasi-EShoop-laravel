@extends('layouts.master')
@section('title','Data Products')
@section('content')
<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-12 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">All Products</h2>

                    @foreach($produk as $prd)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ asset('images/shop/'.$prd->gambar)}}" alt="" />
                                    <h2>Rp.{{$prd->harga_barang}}</h2>
                                    <p>{{$prd->nama_barang}}</p>

                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>Rp.{{$prd->harga_barang}}</h2>

                                        <p class="pull-left">Products</p>
                                        <p>{{$prd->nama_barang}}</p>

                                        <p class="pull-left">Category</p>
                                        <p>{{$prd->kategori->nama_kategori}}</p>

                                        <p class="pull-left">Stok</p>
                                        <p>{{$prd->jumlah_barang}}</p>

                                        <p class="pull-left">Size</p>
                                        <p>{{$prd->ukuran_barang}}</p>
                                        
                                        <p class="pull-left">Deskripsi</p>
                                        <p>{{$prd->deskripsi}}</p>
                                        <a href="{{'/Products/E-Shoop/Admin/'.$prd->id.'/Admin'}}"
                                            class="btn btn-default add-to-cart"><i class="fa fa-edit"></i>Update
                                            Products</a>
                                        <form action="{{'/Products/E-Shoop/Admin/'.$prd->id.'/'.$prd->nama_barang.'/Delete'}}" method="post">
                                        @csrf
                                        @method('delete')
                                            <button class="btn btn-default add-to-cart"><i class="fa fa-trash-o"></i>Delete Products</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!--features_items-->
            </div>
        </div>
    </div>
</section>
@endSection
