<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kantin;
use Session;
use Validator; 

class KantinController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function about()
    {
        return view('about-us');
    }
    public function kantin(Request $request) {
        $halaman = 'kantin';
        $jumlah_kantin = Kantin::count();
        $kantin = Kantin::all();
        
        return view ('index', compact('halaman', 'kantin', 'jumlah_kantin'));
    }
    public function create() {
        $halaman = 'kantin';
        $kantin = Kantin::all();
        return view('kantin.create', compact('halaman', 'kantin'));
    }
    public function simpan_tambah(Request $r) {
        $gambar= $r->gambar;
        $path = '/upload/sampul_kantin';
        $name = $gambar->getClientOriginalName();
        $gambar->move(public_path($path),$name);
        $kantin=Kantin::create([
            'nama_kantin' => $r->nama_kantin,
            'nama_penjual' => $r->nama_penjual,
            'gambar' => $name
        ]);
        return redirect('index');
    }
    public function show($id) {
        $halaman = 'kantin';
        $kantin = Kantin::findOrFail($id);
        return view('kantin.show', compact('halaman', 'kantin'));
    }
    public function edit($id) {
        $halaman = 'kantin';
        $kantin = Kantin::findOrFail($id);
        return view('kantin.edit', compact('halaman', 'kantin'));
    }
    public function update($id, Request $r) {
        $kantin = Kantin::where('id',$id)->first();
        $path = '/upload/sampul_kantin';
        $file = $r->file('gambar');
        $filename = $file->getClientOriginalName();
        $file->move(public_path($path),$filename);
        $update=Kantin::where('id',$id)->update([
            'nama_kantin' => $r->nama_kantin,
            'nama_penjual' => $r->nama_penjual,
            'gambar' => $filename
        ]);
        Session::flash('alert_success','Your data have ben updated');
        return redirect('index');
    }
    public function delete($id) {
        $kantin = Kantin::findOrFail($id);
        $kantin->delete();
        return redirect('index');
    }
}

    
