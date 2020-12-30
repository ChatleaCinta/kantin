<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";
    protected $primaryKey = "id";
    protected $fillable = ['nama_menu', 'id_kategori', 'id_kantin', 'harga', 'gambar', 'stok', 'deskripsi'];
    public $timestamps = false;

    public function pesanan_detail() 
	{
	     return $this->hasMany('App\PesananDetail','id_menu', 'id');
	}
}
