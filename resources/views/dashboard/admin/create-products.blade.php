@extends('layouts.master')
@section('title','Create Products')
@section('content')

<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                @if (session('status'))
                <div class="alert alert-success my-3">
                    {{ session('status') }}
                </div>
                @endif
                <h2>Add New Products</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>Add New Products</h2>
                    <form method="POST" action="{{'/AddProducts/E-Shoop/Admin/Progress'}}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="nama_barang" required placeholder="Nama Product"
                            class="@error('nama_barang') is-invalid @enderror" autocomplete="off" />
                        @error('nama_barang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="number" name="harga_barang" required
                            class="@error('harga_barang') is-invalid @enderror" autocomplete="off"
                            placeholder="Harga Product" />
                        @error('harga_barang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="number" name="jumlah_barang" required
                            class="@error('jumlah_barang') is-invalid @enderror" autocomplete="off"
                            placeholder="Jumlah Product" />
                        @error('jumlah_barang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="text" name="ukuran_barang" required
                            class="@error('ukuran_barang') is-invalid @enderror" autocomplete="off"
                            placeholder="Ukuran Product" />
                        @error('ukuran_barang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <hr>

                        <label for="">Kategori Products</label>
                        <select name="kategori" required id="" class="@error('kategori') is-invalid @enderror">
                        <option value=""></option>
                            @foreach($kategori as $kt)
                            <option value="{{$kt->id}}">{{$kt->nama_kategori}}</option>
                            @endforeach
                        </select>
                        @error('kategori')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <hr>

                        <label for="">Gambar Products</label>
                        <input type="file" name="gambar" required class="@error('gambar') is-invalid @enderror"
                            autocomplete="off" placeholder="Ukuran Product" />
                        @error('gambar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <textarea name="deskripsi" id="" cols="30" rows="10" placeholder="Deskripsi Product"></textarea>

                        <br>
                        <hr>

                        <button type="submit" class="btn btn-default">Create Products</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->
@endSection
