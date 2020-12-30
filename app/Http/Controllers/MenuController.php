<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\JenisMenu;
use App\Kantin;
use DB;
use Session;
use Validator; 

class MenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    
    public function menu($id) {
        $halaman = 'menu';
        $menu = Menu::where('id_kantin',$id)->count();
        $menuall='';
        if($menu > 1){
            $menuall = Menu::where('id_kantin',$id)->first();
        }
        if($menu < 2 && $menu == 1){
            $menuall = Menu::where('id_kantin',$id)->get();
        }
        $jumlah_menu = Menu::count();
        return view ('menu.index', compact('halaman', 'menuall','menu', 'jumlah_menu'));
    }
    public function tambah() {
        $halaman = 'menu';
        $menu = Menu::all();
        $jenis = JenisMenu::all();
        $kantin = Kantin::all();
        return view('menu.create', compact('halaman', 'menu', 'kantin', 'jenis'));
    }
    public function simpan_tambah(Request $r) {
        $gambar= $r->gambar;
        $path = '/upload/sampul_kantin';
        $name = $gambar->getClientOriginalName();
        $gambar->move(public_path($path),$name);
        $menu=Menu::create([
            'nama_menu' => $r->nama_menu,
            'id_kategori' => $r->id_kategori,
            'id_kantin' => $r->id_kantin,
            'harga' => $r->harga,
            'stok' => $r->stok,
            'deskripsi' => $r->deskripsi,
            'gambar' => $name
        ]);
        return redirect('kantin-{id}-menu');
    }
    public function tampil($id) {
        $halaman = 'menu';
        $menu = Menu::findOrFail($id);
        $join = DB::table('menu')
                ->join('jenis_menu','jenis_menu.id','=','menu.id_kategori')
                ->join('kantin','kantin.id','=','menu.id_kantin')
                ->select('menu.id','menu.nama_menu','jenis_menu.nama_jenis','kantin.nama_kantin','menu.harga', 'menu.gambar', 'menu.stok', 'menu.deskripsi')
                ->where('menu.id','=',$id)
                ->first();
        return view('menu.detail', compact('halaman', 'menu', 'join'));
    }
    public function change($id) {
        $halaman = 'menu';
        $menu = Menu::findOrFail($id);
        $jenis = JenisMenu::all();
        $kantin = Kantin::all();
        return view('menu.edit', compact('halaman', 'menu', 'jenis', 'kantin'));
    }
    public function update($id, Request $r) {
        // dd($resuest->all());
        $menu = Menu::where('id',$id)->first();
        $path = '/upload/sampul_kantin';
        $file = $r->file('gambar');
        $filename = $file->getClientOriginalName();
        $file->move(public_path($path),$filename);
        $update=Menu::where('id',$id)->update([
            'nama_menu' => $r->nama_menu,
            'stok' => $r->stok,
            'deskripsi' => $r->deskripsi,
            'id_kantin' => $r->id,
            'id_kategori' => $r->id,
            'harga' => $r->harga,
            'gambar' => $filename
        ]);
        Session::flash('alert_success','Your data have ben updated');
        return redirect('index');
    }
    public function delete($id) {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect('kantin-{id}-menu');
    }
}

    
