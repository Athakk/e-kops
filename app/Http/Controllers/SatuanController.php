<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    function index(Request $request) {
        
        $keyword = $request->input('query');
        
            $satuan = Satuan::get();
        
        return view('admin.inventory.satuan.index', compact('satuan'));
    }

    function create() {
        return view('admin.inventory.satuan.create');
    }
    
    function store(Request $request) {
        $request->validate([
            'nm_satuan' => 'required',
        ]);
        
        Satuan::create($request->all());
        
        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil ditambah!');;
    }
    
    function show() {
        
    }

    function edit(Request $request, Satuan $satuan) {
        return view('admin.inventory.satuan.edit', compact('satuan'));
    }
    
    function update(Request $request, Satuan $satuan) {
        $request->validate([
            'nm_satuan' => 'required',
        ]);

        $satuan->nm_satuan = $request->nm_satuan;
        $satuan->update();
        
        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil diubah!');;
    }

    function destroy(Satuan $satuan) {
        Satuan::destroy($satuan->id);
        return response()->json(['status' => 'Satuan berhasil dihapus!']);
    }

}