<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kantin extends Model
{
    protected $table = "kantin";
    protected $primaryKey = "id";
    protected $fillable = ['nama_kantin', 'nama_penjual', 'gambar'];
    public $timestamps = false;
}
