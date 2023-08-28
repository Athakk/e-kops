<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with('user')->whereNot('status', '2')->orderBy('status', 'DESC')->get();
        $pesananDone = Pesanan::with('user')->where('status', '2')->orderBy('status', 'DESC')->get();
        return view('admin.pesanan.index', compact('pesanan', 'pesananDone'));
    }

    public function detail(Pesanan $pesanan)
    {
        $detail = PesananDetail::with('barang')->where('pesanan_id', $pesanan->id)->get();
        return view('admin.pesanan.detail', compact('pesanan', 'detail'));
    }

    function statusDone(Pesanan $pesanan) 
    {
        $pesanan->update(['status' => '2']);
        return redirect()->route('pesanan')->with('success', 'Status berhasil diubah!');
    }
}