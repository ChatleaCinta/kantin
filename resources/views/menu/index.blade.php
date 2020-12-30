@extends('template')
@include('header')
@section('main')
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-3 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>MENU</h3>
                    <ul>
                        <li><a href="index">Home</a></li>
                        <li class="active">Menu</li>
                    </ul>
                </div>
            </div>
        </div>
<!-- Breadcrumb Area End -->
    <div class="col-xs-12">
        <div class="card">
            <div class="body">
                @if(Session::get('alert_pesan'))
                <div class="alert alert-success">
                    <strong>((Session::get('alert_pesan')}}</strong>
                </div>
                @endif
                <table class="table table-hover table-stripped">
                    <tr>
                        <td>Menu</td>
                        <td>Deskripsi</td>
                        <td>Harga</td>  
                        <td>Stok</td>
                        <td>Aksi</td>
                    </tr>
                    @if($menu > 1)
                    @foreach($menuall as $menuall)
                    <tr>
                        <td>{{$menuall->nama_menu}}</td>
                        <td>{{$menuall->deskripsi}}</td>
                        <td>{{$menuall->harga}}</td>
                        <td>{{$menuall->stok}}</td>
                        <td>
                        <a href="{{ url('pesan-' . $menuall->id) }}" class="btn btn-default">Add to Cart</a>
                        @if(Session::get('level')=='admin')
                        <a href="{{ url('menu-' . $menuall->id . '-change') }}" class="btn btn-default">Edit</a>
                        <a href="{{ url('menu-' . $menuall->id . '-delete') }}" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this data?')">Delete</a>
                        @endif
                        <a href="{{ url($menuall->id . '-menu')}}" class="btn btn-default">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                    @elseif($menu < 2 && $menu == 1)
                    @foreach($menuall as $menuall)
                    <tr>
                        <td>{{$menuall->nama_menu}}</td>
                        <td>{{$menuall->deskripsi}}</td>
                        <td>{{$menuall->harga}}</td>
                        <td>{{$menuall->stok}}</td>
                        <td>
                        <a href="{{ url('pesan-' . $menuall->id) }}" class="btn btn-default">Add to Cart</a>
                        @if(Session::get('level')=='admin')
                        <a href="{{ url('menu-' . $menuall->id . '-change') }}" class="btn btn-default">Edit</a>
                        <a href="{{ url('menu-' . $menuall->id . '-delete') }}" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this data?')">Delete</a>
                        @endif
                        <a href="{{ url($menuall->id . '-menu')}}" class="btn btn-default">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                        <p>kosong</p>
                    @endif
                   
                </table>
                @if(Session::get('level')=='admin')
                <a href="{{ url('menu-tambah') }}" class="btn btn-primary">Tambah Menu</a>
                @endif
            </div>
        </div>
    </div>
@stop
    
