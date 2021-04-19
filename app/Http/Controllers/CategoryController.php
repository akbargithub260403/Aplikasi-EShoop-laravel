<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data   = Kategori::all();

        return view('dashboard.admin.data-category', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.create-category');
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
            'nama_kategori'     => 'required'
        ]);

        try {

            Kategori::create([
                'nama_kategori'     => $request->nama_kategori,
                'deskripsi'         => $request->deskripsi
            ]);

            return back()->with('status' , 'Category Berhasil Dibuat');
        } catch (\Throwable $th) {
            
            dd($th);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('dashboard.admin.update-category',['kategori' => $kategori]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $this->validate($request,[
            'nama_kategori'     => 'required',
            'deskripsi'         => 'required'
        ]);

        try {
            
            Kategori::where('id' , $kategori->id)->update([
                'nama_kategori'     => $request->nama_kategori,
                'deskripsi'         => $request->deskripsi,
            ]);

            return redirect('/Category/E-Shoop/Admin')->with('status','Categori Berhasil Di Update');
        } catch (\Throwable $th) {
            
            dd($th);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        try {
            Kategori::destroy($kategori->id);

            return back()->with('status','Category Berhasil Di Hapus');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
