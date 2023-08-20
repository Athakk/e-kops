<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::where('status', '!=', 2)->get();
        $pesananDone = Pesanan::where('status', 2)->get();
        return view('admin.pesanan.index', compact('pesanan', 'pesananDone'));
    }

    public function detail(PesananDetail $detail)
    {
        return view('admin.pesanan.detail', compact('detail'));
    }

    function statusDone(Pesanan $pesanan) 
    {
        $pesanan->status = 2;
        $pesanan->update();

        return redirect()->route('pesanan.index')->with('success', 'Status berhasil diubah!');
    }
}