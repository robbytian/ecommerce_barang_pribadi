<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $kategoris = Category::all();
        $barangs = Barang::with('Kategori')->take(4)->orderBy('created_at', 'desc')->get();
        return view('product.index', compact('kategoris', 'barangs'));
    }

    public function productList()
    {
        $barangs = Barang::with('Kategori')->get();
        $kategoris = Category::all();
        return view('product.store', compact('kategoris', 'barangs'));
    }

    public function detailProduct(Barang $id)
    {
        $barang = $id->load('Kategori');
        return view('product.detail', compact('barang'));
    }
}
