<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Satuan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    
    function index(Request $request) {        
        $barang = Barang::with('satuan', 'kategori')->get();
        // dd($barang);
        
        return view('admin.inventory.barang.index', compact('barang'));
    }

    function create() {
        $satuan = Satuan::get();
        $kategori = Kategori::get();
        return view('admin.inventory.barang.create', compact('satuan', 'kategori'));
    }
    
    function store(Request $request) {
        $request->validate([
            'nm_barang' => 'required',
            'stok' => 'required',
            'satuan_id' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required',
        ]);

        $barang = new Barang;
        if (isset($request['file'])) {
            $foto_name = time() . '-' . $request->file('file')->getClientOriginalName();
            $image = $request->file('file')->storeAs('public/barang', $foto_name);
            $barang->foto = $foto_name;
        }

        // dd($request['foto']);
        $barang->nm_barang = $request->nm_barang;
        $barang->harga = $request->harga;
        $barang->satuan_id = $request->satuan_id;
        $barang->kategori_id = $request->kategori_id;
        $barang->stok = $request->stok;
        $barang->save();

        
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambah!');
    }
    
    function show() {
        
    }

    function edit(Barang $barang) {
        $satuan = Satuan::get();
        $kategori = Kategori::get();

        return view('admin.inventory.barang.edit', compact('barang', 'satuan', 'kategori'));
    }
    
    function update(Request $request, Barang $barang) {
        $request->validate([
            'nm_barang' => 'required',
            'stok' => 'required',
            'satuan_id' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required',

        ]);

        if (isset($request['foto'])) {
            if (file_exists(storage_path('app/public/' . str_replace('storage/', '', $barang->foto)))) {
                unlink(storage_path('app/public/' . str_replace('storage/', '', $barang->foto)));
            }
            $request['foto'] = 'storage/' . $request->foto->store('barang', 'public');
        }

        $barang->update();
        
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diubah!');;
    }

    function destroy(Barang $barang) {
        Barang::destroy($barang->id);
        return response()->json(['status' => 'Barang berhasil dihapus!']);
    }


}