<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\StokKeluar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BeliController extends Controller
{
    function beliFromDetail(Request $request, Barang $barang) {

        if ($barang->stok < 1) {
            return redirect()->back()->with('failed', 'Stok habis');
        } elseif ($barang->stok < $request->qty) {
            return redirect()->back()->with('failed', 'Stok kurang');
        }
        //create pesanan
        $user = Auth::user();
        $pesanan = new Pesanan();
        
        $pesanan->kd_pesanan = $this->getCode();
        $pesanan->status = '0';
        $pesanan->total_harga =  $request->qty * $barang->harga;
        $pesanan->user_id =  $user->id;
        $pesanan->tanggal = Carbon::now();
        $pesanan->save();
        
        //create pesanan detail 
        $pesananDetail = new PesananDetail();
        
        $pesananDetail->qty = $request->qty;
        $pesananDetail->total_harga = $request->qty * $barang->harga;
        $pesananDetail->barang_id = $barang->id;
        $pesananDetail->pesanan_id = $pesanan->id;
        $pesananDetail->save();
        
        //create stok keluar 
        $stokKeluar = new StokKeluar();
        
        $stokKeluar->barang_id = $barang->id;
        $stokKeluar->stok_keluar = $request->qty;
        $stokKeluar->tanggal = Carbon::now();
        $stokKeluar->pesanan_id = $pesanan->id;
        $stokKeluar->status = "Menunggu";
        $stokKeluar->save();

        //Start MIDTRANS
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $pesanan->id,
                'gross_amount' => $pesanan->total_harga + 2000,
            ),
            'customer_details' => array(
                'name' => $user->nama,
                'email' => $user->email,
                'phone' => $user->whatsapp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $pesanan->snapToken = $snapToken;
        $pesanan->update();

        return redirect()->back()->with('success', 'Berhasil melakukan pembelian, buka halaman pesanan untuk melanjutkan')->with('snapToken', $snapToken);
    }
    
    function callBack(Request $request) {
        $serverKey = config('midtrans.server_key');
        $requestCB = json_decode($request->get('json_callback'));

        $pesanan = Pesanan::find($requestCB->order_id);
        $pesanan->update(['status' => '1', 'snapToken' => null]);
        
        $stokKeluar = StokKeluar::where('pesanan_id', $requestCB->order_id);
        $stokKeluar->update(['status' => 'Selesai']);
        return redirect()->route('pesananHistory')->with('success', 'Pembayaran sukses');
    }

    function destroyPesananDetail(PesananDetail $pesananDetail) {
        $pesanan = Pesanan::find($pesananDetail->pesanan_id);
        $pesanan->total_harga -= $pesananDetail->total_harga;
        $pesanan->update();
        
        PesananDetail::destroy($pesananDetail->id);
        return response()->json(['status' => 'Pesanan berhasil dihapus!']);
    }

    function destroyPesanan(Pesanan $pesanan) {
        Pesanan::destroy($pesanan->id);
        return response()->json(['status' => 'Pesanan berhasil dihapus!']);
    }
    
    function getCode() {
        $lastItem = Pesanan::orderBy('id', 'desc')->first();
        $newCodeNumber = 1;
        
        if ($lastItem) {
            // Ambil nomor kode terakhir, tambahkan 1, dan format sesuai kebutuhan
            $lastCodeNumber = (int) substr($lastItem->kd_pesanan, -4); // Ambil 4 digit terakhir
            $newCodeNumber = $lastCodeNumber + 1;
        }
        
        // Format nomor kode dengan 4 digit, contoh: 0001, 0002, ...
        $newCode = str_pad($newCodeNumber, 4, '0', STR_PAD_LEFT);
        
        return $newCode;
    }


}
