<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(Request $request) {
        $user = User::get();
        return view('admin.user.index', compact('user'));
    }

    function create() {
        return view('admin.user.create');
    }

    function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'whatsapp' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'in:user,admin',
        ]);
        
        $request['password'] = bcrypt($request['password']);

        User::create($request->all());
        
        return redirect()->route('user.index')->with('success', 'User berhasil ditambah!');;
    }
    
    function show() {
        
    }

    function edit(User $user) {
        return view('admin.user.edit', compact('user'));
    }
    
    function update(Request $request, User $user) {
        $request->validate([
            'nama' => 'required',
            'whatsapp' => 'required',
            'email' => 'required',
            'level' => 'in:user,admin',
        ]);
        // dd($user);
        if (!isset($request['password']) || $request['password'] != '') {
            $user->password = bcrypt($request['password']);
        } 

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->update();
        
        return redirect()->route('user.index')->with('success', 'User berhasil diubah!');;
    }

    function destroy(User $user) {
        User::destroy($user->id);
        return response()->json(['status' => 'User berhasil dihapus!']);
    }
}

