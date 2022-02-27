<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $kategoris = Category::all();
        return view('product.index', compact('kategoris'));
    }

    public function productList()
    {
        $kategoris = Category::all();
        return view('product.store', compact('kategoris'));
    }

    public function detailProduct()
    {
        return view('product.detail');
    }
}
