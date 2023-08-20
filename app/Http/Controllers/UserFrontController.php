<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFrontController extends Controller
{
    function index() {
        $pesanan = PesananDetail::orderBy('id', 'DESC')->get();

        $barang_id = [];
        foreach ($pesanan as $value) {
            array_push($barang_id, $value->barang_id);
        }

        $kategori = Kategori::get();
        $barang_most = Barang::with('kategori')->whereIn('id', array_unique($barang_id))->take(8)->get();
        $barang_latest = Barang::with('kategori')->orderBy('id', 'DESC')->take(8)->get();
        
        return view('user.index', compact('barang_latest', 'barang_most', 'kategori'));
    }
    
    function toko() {
        $kategori = Kategori::get();
        $barang = Barang::with('kategori')->get();
        return view('user.toko', compact('barang', 'kategori'));
    }
    
    function pesananHistory() {
        $user = Auth::user();
        $pesanan = PesananDetail::with('barang', 'pesanan')->whereHas('pesanan', function($q) use ($user){
            $q->where('user_id', $user->id);
        })->get();

        return view('user.pesanan', compact('pesanan'));
    }
}
