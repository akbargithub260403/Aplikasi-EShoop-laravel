@extends('layouts.master')
@section('title','Update Products')
@section('content')

<!--form-->
<section id="form">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                @if (session('status'))
                <div class="alert alert-success my-3">
                    {{ session('status') }}
                </div>
                @endif
                <h2>Update Products</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>Update Products</h2>
                    <form method="POST" action="{{'/UpdateProducts/E-Shoop/'.$produk->id.'/Admin/Progress'}}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <label for="">Nama Barang</label>
                        <input type="text" name="nama_barang" required placeholder="Nama Product"
                            class="@error('nama_barang') is-invalid @enderror" value="{{$produk->nama_barang}}" autocomplete="off" />
                        @error('nama_barang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="">Harga Barang</label>
                        <input type="number" name="harga_barang" required
                            class="@error('harga_barang') is-invalid @enderror" value="{{$produk->harga_barang}}" autocomplete="off"
                            placeholder="Harga Product" />
                        @error('harga_barang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="">Jumlah Barang</label>
                        <input type="number" name="jumlah_barang" required
                            class="@error('jumlah_barang') is-invalid @enderror" value="{{$produk->jumlah_barang}}" autocomplete="off"
                            placeholder="Jumlah Product" />
                        @error('jumlah_barang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="">Ukuran Barang</label>
                        <input type="text" name="ukuran_barang" required
                            class="@error('ukuran_barang') is-invalid @enderror" value="{{$produk->ukuran_barang}}" autocomplete="off"
                            placeholder="Ukuran Product" />
                        @error('ukuran_barang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror


                        <hr>
                        <label for="">Kategori</label>
                        <input type="text" name="kategori" required
                            class="@error('kategori') is-invalid @enderror" disabled value="{{$produk->kategori->nama_kategori}}" autocomplete="off"
                            placeholder="Kategori" />
                        @error('kategori')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        
                        <hr>

                        <label for="">Deskripsi Produk</label>
                        <input type="text" value="{{$produk->deskripsi}}" name="deskripsi" class="@error('deskripsi') is-invalid @enderror">
                        @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                        <hr>

                        <button type="submit" class="btn btn-default">Update Products</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->

@endSection