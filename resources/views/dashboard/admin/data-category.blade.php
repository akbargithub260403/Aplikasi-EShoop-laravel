@extends('layouts.master')
@section('title', 'Data Category')
@section('content')
<section>
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success my-3">
                    {{ session('status') }}
                </div>
            @endif
            <h2 class="title text-center">All Category</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Category</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $dt)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$dt->nama_kategori}}</td>
                        <td>{{$dt->deskripsi}}</td>
                        <td>
                            <a href="{{'/Category/E-Shoop/Admin/'.$dt->id.'/Admin'}}"
                                class="btn btn-sm btn-warning">Update</a>
                        </td>
                        <td>
                            <form action="{{'/Category/E-Shoop/Admin/'.$dt->id.'/'.$dt->nama_kategori.'/Delete'}}"
                                method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>@endsection
