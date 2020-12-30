@extends('template')
@include('header')
@section('main')
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-3 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>TAMBAH MENU</h3>
                    <ul>
                        <li><a href="{{ url('kantin-{id}-menu')}}">Menu</a></li>
                        <li class="active">About us </li>
                    </ul>
                </div>
            </div>
        </div>
		<!-- Breadcrumb Area End -->
<div class="container" style="background:white;border-radius:20px;width:70%;margin-top:3rem">
<div style="margin-top:7rem">
      <div id="menu">
          <form action="{{ url('/menu-simpan_tambah')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="nama_menu" class="control-label">Nama Menu</label>
              <input type="text" name="nama_menu" id="nama_menu" class="form-control">
            </div>
            
            <div class="form-group">
            <label for="id_kategori" class="control-label">Kategori</label>
            <select name="id_kategori" class="form-control-static" id="" class="custom-select table-striped">
               <option selected>Pilih Kategori</option>
              @foreach ($jenis as $jenis)
                <option value="{{$jenis->id}}">{{$jenis->nama_jenis}}</option>
               @endforeach
               </select>
              </div>
            </div>

            <div class="form-group">
              <label for="id_kantin" class="control-label">Nama Kantin</label>
              <select name="id_kantin" class="form-control-static" id="" class="custom-select table-striped">
              <option selected>Pilih Kantin</option>
                  @foreach ($kantin as $kantin)
                  <option value="{{$kantin->id}}">{{$kantin->nama_kantin}}</option>
                  @endforeach
                  </select>
                  </div>
            </div>

            
            <div class="form-group">
              <label for="deskripsi" class="control-label">Deskripsi</label>
              <input type="text" name="deskripsi" id="deskripsi" class="form-control">
            </div>
            <div class="form-group">
              <label for="harga" class="control-label">Harga</label>
              <input type="text" name="harga" id="harga" class="form-control">
            </div>
            <div class="form-group">
              <label for="stok" class="control-label">Stok</label>
              <input type="text" name="stok" id="stok" class="form-control">
            </div>
            <div class="form-group">
              <label for="gambar" class="control-label">Gambar</label>
              <input type="file" name="gambar" id="gambar" class="form-control">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          </div>
    </div>
  </div>

@stop
    
