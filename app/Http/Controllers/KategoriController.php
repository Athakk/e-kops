<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    
        function index(Request $request) {
            
            $keyword = $request->input('query');
            
                $kategori = Kategori::get();
            
            return view('admin.inventory.kategori.index', compact('kategori'));
        }
    
        function create() {
            return view('admin.inventory.kategori.create');
        }
        
        function store(Request $request) {
            $request->validate([
                'nm_kategori' => 'required',
            ]);
            
            Kategori::create($request->all());
            
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambah!');;
        }
        
        function show() {
            
        }
    
        function edit(Request $request, Kategori $kategori) {
            return view('admin.inventory.kategori.edit', compact('kategori'));
        }
        
        function update(Request $request, Kategori $kategori) {
            $request->validate([
                'nm_kategori' => 'required',
            ]);
    
            $kategori->nm_kategori = $request->nm_kategori;
            $kategori->update();
            
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diubah!');;
        }
    
        function destroy(Kategori $kategori) {
            Kategori::destroy($kategori->id);
            return response()->json(['status' => 'Kategori berhasil dihapus!']);
        }
    
}
