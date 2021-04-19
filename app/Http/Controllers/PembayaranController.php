<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\User;
use App\Models\Produk;
use App\Models\Cart;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pembayaran(Request $request , $produk_id , $nama_pemesan)
    {
        try {
            
            Pembayaran::create([
                'produk_id'             => $produk_id,
                'nama_pemesan'          => $request->nama_pemesan,
                'email_pemesan'         => $request->email_pemesan,
                'status_pesanan'        => 'diproses',
                'nama_barang'           => $request->nama_barang,
                'harga_barang'          => $request->harga_barang,
                'jumlah_barang'         => $request->jumlah_barang,
                'ukuran_barang'         => $request->ukuran_barang,
                'total_pembayaran'      => $request->total_pembayaran,
                'alamat_pemesan'        => $request->alamat_pemesan
            ]);

            Cart::where('produk_id',$produk_id)->delete();

            return redirect('/Account/E-Shoop/Checkout/'.$nama_pemesan);

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        try {

            $data_produk            = Produk::where('id',$pembayaran->produk_id)->first();

            $update_data_produk     = Produk::where('id',$pembayaran->id)->update([
                'jumlah_barang'         => $data_produk->jumlah_barang + $pembayaran->jumlah_barang
            ]);
            
            Pembayaran::destroy($pembayaran->id);

            return back();

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function checkout($user)
    {
        try {

            $data       = Pembayaran::where('nama_pemesan',$user)->get();

            foreach ($data as $dt) {
                $produk_id      = $dt->produk_id;
            }

            $gambar     = Produk::where('id',$produk_id)->first();

            $gambar     = $gambar->gambar;

            return view('dashboard.user.checkout-pembayaran',['data' => $data , 'gambar' => $gambar]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function datacheckout()
    {
        try {
            $data   = Pembayaran::all();

            return view('dashboard.admin.data-checkout',['data' => $data]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function detailcheckout(Pembayaran $pembayaran)
    {
        $gambar     = Produk::where('id',$pembayaran->produk_id)->first();

        return view('dashboard.admin.detail-checkout',['pembayaran' => $pembayaran , 'gambar' => $gambar]);
    }

    public function updatestatus($id_pembayaran)
    {
        try {

            $dataPembayaran         = Pembayaran::where('id',$id_pembayaran)->first();

            if ($dataPembayaran->status_pesanan == 'diproses') {

                Pembayaran::where('id',$id_pembayaran)->update([
                    'status_pesanan'      => 'dikemas'
                ]);

                return back();

            }elseif ($dataPembayaran->status_pesanan == 'dikemas') {
                
                Pembayaran::where('id',$id_pembayaran)->update([
                    'status_pesanan'      => 'dikirim'
                ]);

                return back();

            }elseif ($dataPembayaran->status_pesanan == 'dikirim') {
                
                Pembayaran::where('id',$id_pembayaran)->update([
                    'status_pesanan'      => 'diterima'
                ]);

                return back();

            }elseif ($dataPembayaran->status_pesanan == 'diterima') {

                return back();

            }

        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
