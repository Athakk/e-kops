<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\StokMasuk;
use Illuminate\Http\Request;

class StokMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stok_masuk = StokMasuk::with('barang.satuan')->orderBy('id', 'DESC')->get();
        
        return view('admin.inventory.stok.stok-masuk.index', compact('stok_masuk'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::get();
        return view('admin.inventory.stok.stok-masuk.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'stok_masuk' => 'required',
            'tanggal' => 'required',
        ]);


        StokMasuk::create($request->all());
        
        return redirect()->route('stok-masuk.index')->with('success', 'Stok masuk berhasil ditambah!');

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
    public function edit(StokMasuk $stok_masuk)
    {
        $barang = Barang::get();
        return view('admin.inventory.stok.stok-masuk.edit', compact('stok_masuk', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StokMasuk $stok_masuk)
    {
        $request->validate([
            'barang_id' => 'required',
            'stok_masuk' => 'required',
            'tanggal' => 'required',
        ]);

        $stok_masuk->barang_id = $request->barang_id;
        $stok_masuk->stok_masuk = $request->stok_masuk;
        $stok_masuk->tanggal = $request->tanggal;
        $stok_masuk->update();
        
        return redirect()->route('stok-masuk.index')->with('success', 'Stok masuk berhasil diubah!');;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StokMasuk $stok_masuk)
    {
        StokMasuk::destroy($stok_masuk->id);
        return response()->json(['status' => 'Stok masuk berhasil dihapus!']);

    }
}
