<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            'file' => 'required'
        ]);

        $barang = new Barang;
        if ($request->file('file')) {
            $foto_name = time() . '-' . $request->file('file')->getClientOriginalName();
            $image = $request->file('file')->storeAs('public/barang', $foto_name);
            $barang->foto = $foto_name;
        }

        // dd($request['foto']);
        $barang->nm_barang = $request->nm_barang;
        $barang->harga = str_replace('.', '', $request->harga);
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
            'satuan_id' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required',
            'file' => 'required'
        ]);


        if ($request->file('file')) {
            File::delete('storage/barang/'. $barang->foto);

            $foto_name = time() . '-' . $request->file('file')->getClientOriginalName();
            $image = $request->file('file')->storeAs('public/barang', $foto_name);
            $barang->foto = $foto_name;
        }

        $barang->nm_barang = $request->nm_barang;
        $barang->harga = str_replace('.', '', $request->harga);
        $barang->satuan_id = $request->satuan_id;
        $barang->kategori_id = $request->kategori_id;
        $barang->update();
        
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diubah!');;
    }

    function destroy(Barang $barang) {
        File::delete('storage/barang/'. $barang->foto);
        Barang::destroy($barang->id);
        return response()->json(['status' => 'Barang berhasil dihapus!']);
    }


}