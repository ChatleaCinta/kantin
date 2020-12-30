<?php

namespace App\Http\Controllers;
use App\Menu;
use App\Pesanan;
use App\User;
use App\PesananDetail;
use Auth;
use Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index($id)
    {
    	$menu = Menu::where('id', $id)->first();

    	return view('menu.index', compact('menu'));
    }

    public function pesan(Request $request, $id)
    {	
    	$menu = Menu::where('id', $id)->first();
    	$tanggal = Carbon::now();

    	//validasi apakah melebihi stok
    	if($request->jumlah> $menu->stok)
    	{
    		return redirect('pesan-'.$id);
    	}

    	//cek validasi
    	$cek_pesanan = Pesanan::where('id_user', Auth::user()->id)->where('status',0)->first();
    	//simpan ke database pesanan
    	if(empty($cek_pesanan))
    	{
    		$pesanan = new Pesanan;
	    	$pesanan->user_id = Auth::user()->id;
	    	$pesanan->tanggal = $tanggal;
	    	$pesanan->status = 0;
	    	$pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(100, 999);
	    	$pesanan->save();
    	}
    	

    	//simpan ke database pesanan detail
    	$pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

    	//cek pesanan detail
    	$cek_pesanan_detail = PesananDetail::where('id_menu', $menu->id)->where('id_pesanan', $pesanan_baru->id)->first();
    	if(empty($cek_pesanan_detail))
    	{
    		$pesanan_detail = new PesananDetail;
	    	$pesanan_detail->id_menu = $menu->id;
	    	$pesanan_detail->id_pesanan = $pesanan_baru->id;
	    	$pesanan_detail->jumlah = $request->jumlah_pesan;
	    	$pesanan_detail->total_harga = $menu->harga*$request->jumlah_pesan;
	    	$pesanan_detail->save();
    	}else 
    	{
    		$pesanan_detail = PesananDetail::where('id_menu', $menu->id)->where('id_pesanan', $pesanan_baru->id)->first();

    		$pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;

    		//harga sekarang
    		$harga_pesanan_detail_baru = $menu->harga*$request->jumlah_pesan;
	    	$pesanan_detail->total_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
	    	$pesanan_detail->update();
    	}

    	//jumlah total
    	$pesanan = Pesanan::where('id_user', Auth::user()->id)->where('status',0)->first();
    	$pesanan->total_harga = $pesanan->total_harga+$menu->harga*$request->jumlah_pesan;
    	$pesanan->update();
    	
        Alert::success('Pesanan Sukses Masuk Keranjang', 'Success');
    	return redirect('check-out');

    }

    public function check_out()
    {
        $pesanan = Pesanan::where('id_user', Auth::user()->id)->where('status',0)->first();
 	$pesanan_details = [];
        if(!empty($pesanan))
        {
            $pesanan_details = PesananDetail::where('id_pesanan', $pesanan->id)->get();

        }
        
        return view('pesan.check_out', compact('pesanan', 'pesanan_details'));
    }

    public function delete($id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->id_pesanan)->first();
        $pesanan->total_harga = $pesanan->total_harga-$pesanan_detail->total_harga;
        $pesanan->update();


        $pesanan_detail->delete();

        Alert::error('Pesanan Sukses Dihapus', 'Hapus');
        return redirect('check-out');
    }

    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();

        // if(empty($user->nama))
        // {
        //     Alert::error('Identitasi Harap dilengkapi', 'Error');
        //     return redirect('profile');
        // }

        // if(empty($user->email))
        // {
        //     Alert::error('Identitasi Harap dilengkapi', 'Error');
        //     return redirect('profile');
        // }

        $pesanan = Pesanan::where('id_user', Auth::user()->id)->where('status',0)->first();
        $id_pesanan = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('id_pesanan', $id_pesanan)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $menu = Menu::where('id', $pesanan_detail->id_menu)->first();
            $menu->stok = $menu->stok-$pesanan_detail->jumlah;
            $menu->update();
        }

        Alert::success('Pesanan Sukses Check Out Silahkan Lanjutkan Proses Pembayaran', 'Success');
        return redirect('history/'.$id_pesanan);

    }

}

