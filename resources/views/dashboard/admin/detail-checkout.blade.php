@extends('layouts.master')
@section('title', 'Detail Checkout')
@section('content')
<section>
    <div class="container">
        <div class="row">
            @if (session('status'))
            <div class="alert alert-success my-3">
                {{ session('status') }}
            </div>
            @endif
            <h2 class="title text-center">Detail Checkout</h2>
            <div class="card mb-3" style="max-width: 700px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{asset('/images/shop/'.$gambar->gambar)}}" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                <h3>Detail Pesanan</h3>
                            </h5>
                            <p class="card-text">Nama Pemesan : <span>{{$pembayaran->nama_pemesan}}</span></p>
                            <p class="card-text">Email Pemesan : <span>{{$pembayaran->email_pemesan}}</span></p>
                            <p class="card-text">Status Pesanan : 
                                @if($pembayaran->status_pesanan == 'diproses')
                                <button class="btn btn-primary btn-xs">{{$pembayaran->status_pesanan}}</button>
                                @elseif($pembayaran->status_pesanan == 'dikemas')
                                <button class="btn btn-info btn-xs">{{$pembayaran->status_pesanan}}</button>
                                @elseif($pembayaran->status_pesanan == 'dikirim')
                                <button class="btn btn-danger btn-xs">{{$pembayaran->status_pesanan}}</button>
                                @elseif($pembayaran->status_pesanan == 'diterima')
                                <button class="btn btn-success btn-xs">{{$pembayaran->status_pesanan}}</button>
                                @endif</p>
                            <p class="card-text">Nama Barang : <span>{{$pembayaran->nama_barang}}</span></p>
                            <p class="card-text">Harga Barang : <span>Rp.{{$pembayaran->harga_barang}}</span></p>
                            <p class="card-text">Jumlah Barang : <span>Rp.{{$pembayaran->jumlah_barang}}</span></p>
                            <p class="card-text">Ukuran Barang : <span>Rp.{{$pembayaran->ukuran_barang}}</span></p>
                            <p class="card-text">Total Pembayaran : <span>Rp.{{$pembayaran->total_pembayaran}}</span>
                            </p>
                            <hr>
                            <form action="{{'/Checkout/UpdateStatus/'.$pembayaran->id.'/Admin'}}" method="post">
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn btn-primary btn-sm">Update Status</button>
                            </form>
                            <hr>
                            <p class="card-text"><small class="text-muted">Tanggal Pemesanan
                                    {{$pembayaran->created_at}}</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</section>
@endsection
