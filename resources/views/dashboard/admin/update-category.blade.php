@extends('layouts.master')
@section('title', 'Update Category')
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
                <h2>Update Category</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>Update Category</h2>
                    <form method="POST" action="{{'/UpdateCategory/E-Shoop/'.$kategori->id.'/Admin/Progress'}}">
                        @csrf
                        @method('patch')
                        <label for="">Nama Kategori</label>
                        <input type="text" name="nama_kategori" value="{{$kategori->nama_kategori}}" required placeholder="Nama Category"
                            class="@error('nama_kategori') is-invalid @enderror" autocomplete="off" />
                        @error('nama_kategori')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        
                        <label for="">Deskripsi</label>
                        <input type="text" name="deskripsi" value="{{$kategori->deskripsi}}" required placeholder="Deskripsi"
                            class="@error('deskripsi') is-invalid @enderror" autocomplete="off" />
                        @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <br>
                        <hr>

                        <button type="submit" class="btn btn-default">Update Category</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>

@endsection