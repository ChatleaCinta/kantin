<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    public function barang()
	{
	      return $this->belongsTo('App\Menu','id_menu', 'id');
	}

	public function pesanan()
	{
	      return $this->belongsTo('App\Pesanan','id_pesanan', 'id');
	}
}