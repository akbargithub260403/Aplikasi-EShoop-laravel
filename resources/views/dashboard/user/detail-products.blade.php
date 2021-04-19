@extends('layouts.master')
@section('title','Detail Products')
@section('content')

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-9 padding-right">
                <div class="product-details">
                    <!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{ asset('/images/shop/'.$produk->gambar)}}" alt="" />
                        </div>

                    </div>
                    <div class="col-sm-10">
                        <div class="product-information">
                            <!--/product-information-->
                            <img src="{{ asset('images/product-details/new.jpg')}}" class="newarrival" alt="" />
                            <h2>{{$produk->nama_barang}}</h2>
                            <img src="{{ asset('/images/product-details/rating.png')}}" alt="" />
                            <hr>
                            <span>
                                <span>Rp.{{$produk->harga_barang}}</span>
                                <label>Quantity:</label>
                                <input type="text" value="{{$produk->jumlah_barang}}" disabled />
                                <a href="{{'/AddCart/Products/'.$produk->id.'/E-Shooper/'.Auth::user()->id.'/'.$produk->nama_barang}}" class="btn btn-fefault cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </a>
                            </span>
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Condition:</b> New</p>
                            <p><b>Size:</b> {{$produk->ukuran_barang}}</p>
                            <p><b>Description:</b> {{$produk->deskripsi}}</p>
                            <p><b>Brand:</b> E-SHOPPER</p>
                            <a href=""><img src="{{ asset('images/product-details/share.png')}}" class="share img-responsive"
                                    alt="" /></a>
                        </div>
                        <!--/product-information-->
                    </div>
                </div>
                <!--/product-details-->

                <div class="category-tab shop-details-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        
                        <div class="tab-pane fade active in" id="reviews">
                            <div class="col-sm-12">

                                @foreach($review as $rew)
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>{{$rew->nama}}</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>{{$rew->created_at}}</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>{{$rew->created_at}}</a></li>
                                </ul>
                                <p>{{$rew->review}}.</p>
                                <input type="text" name="" class="form-control" value="{{$rew->rating}}" readonly id="">

                                @endforeach
                                <hr>

                                <p><b>Write Your Review</b></p>

                                <form method="post" action="{{'/Account/'.Auth::user()->name.'/Products/'.$produk->nama_barang.'/Review'}}">
                                @csrf
                                <input type="hidden" name="produk_id" value="{{$produk->id}}" id="">
                                    <span>
                                        <input type="text" name="nama" placeholder="Your Name" readonly value="{{Auth::user()->name}}"/>
                                        <input type="email" name="email" value="{{Auth::user()->email}}" readonly placeholder="Email Address" />
                                    </span>
                                    <textarea name="review" required></textarea>
                                    <hr>
                                    <label for="">Rating</label>
                                    <select name="rating" id="">
                                        <option value="NotReview"></option>
                                        <option value="VeryBad">VeryBad</option>
                                        <option value="Bad">Bad</option>
                                        <option value="Good">Good</option>
                                        <option value="VeryGood">VeryGood</option>
                                    </select>
                                    <hr>
                                    <button type="submit" class="btn btn-default pull-left">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <!--/category-tab-->

               

            </div>
        </div>
    </div>
</section>

@endSection