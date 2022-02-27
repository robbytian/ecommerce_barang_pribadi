<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use App\Models\FileKarya;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::with('Kategori')->where('pemilik', auth()->user()->id)->get();
        return view('dashboard.barang', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.addBarang', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'category_id' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
            'jenis' => 'required',
        ]);
        $file = $request->file('foto');
        $name = time() . rand(1, 100) . '.' . $file->extension();
        $file->move(public_path('foto_barang'), $name);

        $barang = Barang::create([
            'pemilik' => auth()->user()->id,
            'nama_barang' => $request->nama_barang,
            'category_id' => $request->category_id,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'foto' => $name,
            'jenis' => $request->jenis,
            'status' => 'Belum Terjual'
        ]);

        if ($request->jenis == 'Kepemilikan Karya') {
            $kode = Str::random(10);
            $fileKarya = $request->file('file');
            $nameKarya = time() . rand(1, 100) . '.' . $fileKarya->extension();
            $fileKarya->move(public_path('fileKarya'), $name);
            FileKarya::create([
                'code' => $kode,
                'barang_id' => $barang->id,
                'file' => $nameKarya,
                'pemilik' => auth()->user()->id,
            ]);
        }
        Alert::success('success', 'Barang berhasil ditambahkan');
        return redirect('/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
