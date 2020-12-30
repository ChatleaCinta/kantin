@extends('template')
@include('header')
@section('main')
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-3 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>TAMBAH KANTIN</h3>
                    <ul>
                        <li><a href="{{ url('/index')}}">Kantin</a></li>
                        <li class="active">About us </li>
                    </ul>
                </div>
            </div>
        </div>
<!-- Breadcrumb Area End -->
<div class="container" style="background:white;border-radius:20px;width:70%;margin-top:3rem">
<div style="margin-top:7rem">
<div id="kantin">
    <form action="{{ url('/kantin-simpan_tambah') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="nama_kantin" class="control-label">Nama Kantin</label>
            <input name="nama_kantin" type="text" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="nama_penjual" class="control-label">Nama Penjual</label>
            <input name="nama_penjual" type="text" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="gambar" class="control-label">Gambar</label>
            <input name="gambar" type="file" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        </div>
        </div>
@stop