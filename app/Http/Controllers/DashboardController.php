<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\Satuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function index() {
        $barang = Barang::all()->count();
        $satuan = Satuan::all()->count();
        $kategori = Kategori::all()->count();

        $penjualan_per_month = [];
        $month = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        
        foreach ($month as $key => $value) {
            $pesanan = Pesanan::whereMonth('tanggal', $value)->count();
            array_push($penjualan_per_month, $pesanan);
        }


        return view('admin.index', compact('barang', 'satuan', 'kategori', 'penjualan_per_month'));
    }
}
