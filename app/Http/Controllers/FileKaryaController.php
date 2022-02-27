<?php

namespace App\Http\Controllers;

use App\Models\FileKarya;
use Illuminate\Http\Request;

class FileKaryaController extends Controller
{
    public function karya()
    {
        $karya = FileKarya::with('Barang')->where('pemilik', auth()->user()->id)->get();
        return view('dashboard.fileKarya', compact('karya'));
    }
}
