@extends('layouts.master')
@section('title','Home')
@section('content')

<section id="slider">
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Diskon Hingga 60% Tiap Bulan nya</h2>
                                <p>Jangan sampai Kelewatan Diskon Tiap Awal Bulan. Awal Bulan diberi Diskon Hingga
                                    60% Jangan Sampai Terlewatkan. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('images/home/girl1.jpg')}}" class="girl img-responsive" alt="" />
                                <img src="{{ asset('/images/home/pricing.png')}}" class="pricing" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>100% Dijamin Murah nya</h2>
                                <p>Barang Murah Tapi Berkualitas Internasional , Yang Ingin Bergaya Tapi Uang Pas
                                    Pas-an Jangan Sampai Terlewatkan Diskon Awal Bulan. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('images/home/girl2.jpg')}}" class="girl img-responsive" alt="" />
                                <img src="{{ asset('/images/home/pricing.png')}}" class="pricing" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Jangan Sampai Kehabisan Barang nya</h2>
                                <p>Jangan Sampai Seperti Mereka yang Terlewatkan Diskon dan Promo nya , Hingga
                                    Kehabisan Barang. AYo Segeralah Berbelanja. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('/images/home/girl3.jpg')}}" class="girl img-responsive" alt="" />
                                <img src="{{ asset('/images/home/pricing.png')}}" class="pricing" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->
                        @foreach($kategori as $ktg)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">{{$ktg->nama_kategori}}</a></h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--/category-products-->

                    <div class="shipping text-center">
                        <!--shipping-->
                        <img src="images/home/shipping.jpg" alt="" />
                    </div>
                    <!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    
                    @foreach($produk as $prd)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ asset('/images/shop/'.$prd->gambar)}}" />
                                        <h2>Rp.{{$prd->harga_barang}}</h2>
                                        <p>{{$prd->nama_barang}}</p>
                                        <a href="{{'/Products/E-Shooper/'.$prd->id.'/Detail'}}" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Detail</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>Rp.{{$prd->harga_barang}}</h2>
                                            <p>{{$prd->nama_barang}}</p>
                                            <a href="{{'/Products/E-Shooper/'.$prd->id.'/Detail'}}" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Detail</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to cart</a></li>
                                    </ul>
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
