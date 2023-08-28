<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\StokKeluar;
use Illuminate\Http\Request;

class StokKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stok_keluar = StokKeluar::with('barang.satuan')->orderBy('id', 'DESC')->get();
        
        return view('admin.inventory.stok.stok-keluar.index', compact('stok_keluar'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::get();
        return view('admin.inventory.stok.stok-keluar.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'stok_keluar' => 'required',
            'tanggal' => 'required',
        ]);

        $barang = Barang::find($request['barang_id']);

        if (($barang->stok - $request['stok_keluar']) < 0) {
            return redirect()->route('stok-keluar.create')->with('failed', 'Gagal menambahkan stok kurang');
        }


        StokKeluar::create($request->all());
        
        return redirect()->route('stok-keluar.index')->with('success', 'Stok keluar berhasil ditambah!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StokKeluar $stok_keluar)
    {
        $barang = Barang::get();
        return view('admin.inventory.stok.stok-keluar.edit', compact('stok_keluar', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StokKeluar $stok_keluar)
    {
        $request->validate([
            'barang_id' => 'required',
            'stok_keluar' => 'required',
            'tanggal' => 'required',
        ]);

        $stok_keluar->barang_id = $request->barang_id;
        $stok_keluar->stok_keluar = $request->stok_keluar;
        $stok_keluar->tanggal = $request->tanggal;

        $barang = Barang::find($request['barang_id']);
        if (($barang->stok - $stok_keluar->stok_keluar) < 0) {
            return redirect()->route('stok-keluar.create')->with('failed', 'Gagal menambahkan stok kurang');
        }

        $stok_keluar->update();
        
        return redirect()->route('stok-keluar.index')->with('success', 'Stok keluar berhasil diubah!');;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StokKeluar $stok_keluar)
    {
        StokKeluar::destroy($stok_keluar->id);
        return response()->json(['status' => 'Stok keluar berhasil dihapus!']);

    }
}
