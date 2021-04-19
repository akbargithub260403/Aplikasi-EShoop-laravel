<?php

namespace App\Http\Controllers;

use File;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Review;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $produk     = Produk::all();
        $kategori   = Kategori::all();

        return view('dashboard.home',['produk' => $produk , 'kategori' => $kategori]);
    }
    public function index_admin()
    {
        $produk   = Produk::all();

        return view('dashboard.admin.data-products',['produk' => $produk]);
    }

    public function index_user()
    {
        $produk     = Produk::all();
        $kategori   = Kategori::all();

        return view('dashboard.user.All-Products',['produk' => $produk , 'kategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori   = Kategori::all();

        return view('dashboard.admin.create-products',['kategori' => $kategori]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_barang'           => 'required',
            'harga_barang'          => 'required',
            'jumlah_barang'         => 'required',
            'ukuran_barang'         => 'required',
            'gambar'                => 'required|file|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:2048'
        ]);

        $kategori   = Kategori::where('id',$request->kategori)->first();
        
        try {

            // menyimpan data file yang diupload ke variabel $file
        $gambar = $request->file('gambar');

		$nama_gambar = time()."_".$gambar->getClientOriginalName();

      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images/shop';

        $gambar->move($tujuan_upload,$nama_gambar);
            
            Produk::create([
                'kategori_id'       => $kategori->id,
                'nama_barang'       => $request->nama_barang,
                'harga_barang'      => $request->harga_barang,
                'jumlah_barang'     => $request->jumlah_barang,
                'ukuran_barang'     => $request->ukuran_barang,
                'gambar'            => $nama_gambar,
                'deskripsi'         => $request->deskripsi
            ]);
        
        return redirect('/AddProducts/E-Shoop/Admin')->with('status','Product Berhasil Ditambahkan');

        } catch (\Throwable $th) {
            
            dd($th);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        $review     = Review::where('produk_id',$produk->id)->get();

        return view('dashboard.user.detail-products',['produk' => $produk , 'review' => $review]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('dashboard.admin.update-products',['produk' => $produk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $this->validate($request,[
            'nama_barang'       => 'required',
            'harga_barang'      => 'required',
            'jumlah_barang'     => 'required',
            'ukuran_barang'     => 'required',
            'deskripsi'         => 'required'
        ]);

        Produk::where('id',$produk->id)->update([
            'nama_barang'       => $request->nama_barang,
            'harga_barang'      => $request->harga_barang,
            'jumlah_barang'     => $request->jumlah_barang,
            'ukuran_barang'     => $request->ukuran_barang,
            'deskripsi'         => $request->deskripsi
        ]);

        return back()->with('status','Data Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk , $nama_produk)
    {
        try {

            $gambar     = Produk::where('id',$produk->id)->first();

            File::delete('images/shop/'.$gambar->gambar);

            Produk::destroy($produk->id);

            return back();
        } catch (\Throwable $th) {
            
            dd($th);

        }

    }

}
