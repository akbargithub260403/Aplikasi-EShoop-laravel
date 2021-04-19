@extends('layouts.master')
@section('title','Create Category')
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
                <h2>Add New Category</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>Add New Category</h2>
                    <form method="POST" action="{{'/AddCategory/E-Shoop/Admin/Progress'}}">
                        @csrf
                        <input type="text" name="nama_kategori" required placeholder="Nama Category"
                            class="@error('nama_kategori') is-invalid @enderror" autocomplete="off" />
                        @error('nama_kategori')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <hr>

                        <textarea name="deskripsi" id="" cols="30" rows="10" placeholder="Deskripsi Category"></textarea>

                        <br>
                        <hr>

                        <button type="submit" class="btn btn-default">Create Category</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>

@endSection