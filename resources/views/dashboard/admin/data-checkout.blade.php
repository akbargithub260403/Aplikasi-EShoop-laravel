@extends('layouts.master')
@section('title', 'Data Checkout')
@section('content')
<section>
    <div class="container">
        <div class="row">
            @if (session('status'))
            <div class="alert alert-success my-3">
                {{ session('status') }}
            </div>
            @endif
            <h2 class="title text-center">All Checkout</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pemesan</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah Barang</th>
                        <th scope="col">Total Pembayaran</th>
                        <th scope="col">Alamat Pemesan</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $dt)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$dt->nama_pemesan}}</td>
                        <td>{{$dt->nama_barang}}</td>
                        <td>{{$dt->jumlah_barang}}</td>
                        <td>Rp.{{$dt->total_pembayaran}}</td>
                        <td>{{$dt->alamat_pemesan}}</td>
                        <td>

                        <a href="{{'/DetailCheckout/'.$dt->id.'/E-Shoop/Admin'}}" class="btn btn-info btn-sm">Detail Pesanan</a>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>@endsection
