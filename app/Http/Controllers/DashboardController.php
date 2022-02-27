<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\FileKarya;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahBarang = Barang::where('pemilik', auth()->user()->id)->count();
        $jumlahPenjualan = Transaksi::where('pemilik', auth()->user()->id)->count();
        $jumlahPembeli = Transaksi::where('pembeli', auth()->user()->id)->count();
        $jumlahKarya = FileKarya::where('pemilik', auth()->user()->id)->count();
        return view('dashboard.index', compact('jumlahBarang', 'jumlahPenjualan', 'jumlahPembeli', 'jumlahKarya'));
    }

    public function penjualan()
    {
        return view('dashboard.penjualan');
    }

    public function pembelian()
    {
        return view('dashboard.pembelian');
    }

    public function karya()
    {
        return view('dashboard.fileKarya');
    }
}
