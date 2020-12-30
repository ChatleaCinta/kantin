<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenis_menu;

class JenisMenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function jenis_menu() {
        $halaman = 'jenis_menu';
        $jenis_list = Jenis_menu::all();
        $jumlah_jenis = Jenis_menu::count();
        return view ('jenis_menu.index', compact('halaman', 'jenis_list', 'jumlah_jenis'));
    }
    public function create() {
        $halaman = 'jenis_menu';
        return view('jenis_menu.create', compact('halaman'));
    }
    public function store(Request $request) {
        Jenis_menu::create($request->all());
        return redirect('jenis');
    }
    public function edit($id) {
        $halaman = 'jenis_menu';
        $jenis = Jenis_menu::findOrFail($id);
        return view('jenis_menu.edit', compact('halaman', 'jenis'));
    }
    public function update($id, Request $request) {
        $halaman = 'genre';
        $jenis = Jenis_menu::findOrFail($id);
        $jenis->nama_jenis = $request->nama_jenis;
        $jenis->save();
        return redirect('jenis');
    }
    public function delete($id) {
        $jenis = Jenis_menu::findOrFail($id);
        $jenis->delete();
        return redirect('jenis');
    }
}

    
