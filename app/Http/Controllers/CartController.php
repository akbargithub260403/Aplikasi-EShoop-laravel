<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {
        $user       = User::where('name',$user)->first();

        $cart       = Cart::where('user_id',$user->id)->get();

        return view('dashboard.user.cart-products',['cart' => $cart]);
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
    public function store($produk_id ,$user_id, $nama_barang)
    {
        try {
            $data_barang    = Produk::where('id',$produk_id)->first();
            
            Cart::create([
                'produk_id'     => $produk_id,
                'user_id'       => $user_id,
                'ukuran_barang' => $data_barang->ukuran_barang,
                'jumlah_barang' => 1
            ]);

            $update_jumlah_produk       = Produk::where('id',$produk_id)->update([
                'jumlah_barang'     => $data_barang->jumlah_barang - 1 
            ]);

            $user       = User::where('id',$user_id)->first();

            return redirect('/Account/E-Shoop/Cart/'.$user->name);

        } catch (\Throwable $th) {
            
            dd($th);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        try {

            $jumlah_barang  = Produk::where('id',$cart->produk_id)->first();

            Produk::where('id',$cart->produk_id)->update([
                'jumlah_barang'     => $jumlah_barang->jumlah_barang + $cart->jumlah_barang
            ]);

            Cart::destroy($cart->id);

            return back();

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function quantity($type , $user_id , $produk_id)
    {
        try {
            
            if ($type == 'Up') {

                $data_produk      = Produk::where('id',$produk_id)->first();

                $update_data_produk        = Produk::where('id',$produk_id)->update([
                    'jumlah_barang'     => (string)$data_produk->jumlah_barang - 1
                ]);
            
                $data_cart          = Cart::where('user_id',$user_id)
                                            ->when($produk_id, function ($query, $produk_id) {
                                                return $query->where('produk_id', $produk_id);
                                            })->first();

                $jumlah_barang      = $data_cart->jumlah_barang + 1;
                
                $update             = Cart::where('user_id',$user_id)
                                            ->when($produk_id , function ($query , $produk_id){
                                                return $query->where('produk_id',$produk_id);
                                            })->update([
                                                'jumlah_barang'     => (string)$jumlah_barang
                                            ]);
                return back();

            }elseif ($type == 'Down') {

                $data_produk      = Produk::where('id',$produk_id)->first();

                $update_data_produk        = Produk::where('id',$produk_id)->update([
                    'jumlah_barang'     => (string)$data_produk->jumlah_barang + 1
                ]);
                
                $data_cart         = Cart::where('user_id',$user_id)
                                            ->when($produk_id, function ($query, $produk_id) {
                                                return $query->where('produk_id', $produk_id);
                                            })->first();

                $jumlah_barang      = $data_cart->jumlah_barang - 1;
                
                $update             = Cart::where('user_id',$user_id)
                                            ->when($produk_id , function ($query , $produk_id){
                                                return $query->where('produk_id',$produk_id);
                                            })->update([
                                                'jumlah_barang'     => (string)$jumlah_barang
                                            ]);
                return back();

            }else {
                return back();
            }

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function checkout(Cart $cart)
    {
        return view('dashboard.user.checkout-products',['cart' => $cart]);
    }
}
