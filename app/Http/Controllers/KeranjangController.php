<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    function addKeranjang(Barang $barang) {
        
        $user = Auth::user();
        
        $keranjang = Keranjang::where('user_id', $user->id)->where('barang_id', $barang->id)->first();

        
        if ($keranjang == null) {
            $keranjang = new Keranjang();

            $keranjang->barang_id = $barang->id;
            $keranjang->user_id = $user->id;
            $keranjang->qty += 1;
        } else {
            $keranjang->qty += 1;
        }
        $keranjang->save();
        
        return redirect()->back();
    }

}
