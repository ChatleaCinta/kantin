<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisMenu extends Model
{
    protected $table = "jenis_menu";
    protected $primaryKey = "id";
    protected $fillable = ['nama_jenis'];
    public $timestamps = false;
}
