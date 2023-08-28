<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFrontController extends Controller
{
    function home() {
        $pesanan = PesananDetail::orderBy('id', 'DESC')->get();

        $barang_id = [];
        foreach ($pesanan as $value) {
            array_push($barang_id, $value->barang_id);
        }

        $kategori = Kategori::get();
        $keranjang = Keranjang::where('user_id', Auth::user()->id)->get();
        $barang_most = Barang::with('kategori')->whereIn('id', array_unique($barang_id))->take(8)->get();
        $barang_latest = Barang::with('kategori')->orderBy('id', 'DESC')->take(8)->get();
        
        return view('user.index', compact('barang_latest', 'barang_most', 'kategori', 'keranjang'));
    }
    
    function toko() {
        $kategori = Kategori::get();
        $barang = Barang::with('kategori')->get();
        $keranjang = Keranjang::where('user_id', Auth::user()->id)->get();

        return view('user.toko', compact('barang', 'kategori', 'keranjang'));
    }

    function tokoSearch($barang_id) {
        $kategori = Kategori::get();
        $keranjang = Keranjang::where('user_id', Auth::user()->id)->get();
        
        if (isset($barang_id)) {
            $barang = Barang::with('kategori')->whereIn('id', $barang_id)->get();
        } else {
            $barang = Barang::with('kategori')->get();
        }
        return view('user.toko', compact('barang', 'kategori', 'keranjang'));
    }
    
    function pesananHistory() {
        $kategori = Kategori::get();
        $keranjang = Keranjang::where('user_id', Auth::user()->id)->get();
        
        $user = Auth::user();
        $pesanan = Pesanan::where('user_id', $user->id)->orderBy('id', 'desc')->get();

        return view('user.pesanan', compact('pesanan', 'kategori', 'keranjang'));
    }

    function pesananHistoryDetail(Pesanan $pesanan) {
        $kategori = Kategori::get();
        $keranjang = Keranjang::where('user_id', Auth::user()->id)->get();
        
        $pesananDetail = PesananDetail::with('barang', 'pesanan')->where('pesanan_id', $pesanan->id)->get();

        return view('user.pesanan-detail', compact('pesananDetail', 'kategori', 'keranjang'));
    }

    function itemDetail(Barang $barang) {  
        $kategori = Kategori::get();
        $keranjang = Keranjang::where('user_id', Auth::user()->id)->get();
        $barang = Barang::with('kategori')->find($barang->id);

        $barangRelated = Barang::where('kategori_id', $barang->kategori->id)->whereNotIn('id', [$barang->id])->take(5)->get();

        return view('user.item-detail', compact('barang', 'kategori', 'keranjang', 'barangRelated'));
    }

    function searchItem(Request $request) {
        if ($request->has('query')) {
            $query = $request['query'];
        }

        $barang_id = Barang::where('nm_barang','like', '%'.$query.'%')->pluck('id');

        return $this->tokoSearch($barang_id);
    }

    function searchItemKategori($kategori_id) {
        
        $barang = Kategori::find($kategori_id)->barang;
        $kategori = Kategori::get();
        $keranjang = Keranjang::where('user_id', Auth::user()->id)->get();

        return view('user.toko', compact('barang', 'kategori', 'keranjang'));
    }
}
