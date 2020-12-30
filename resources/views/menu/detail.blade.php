@extends('template')
@include('header')
@section('main')

<!-- Fontawesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-3 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>DETAIL MENU</h3>
                    <ul>
                        <li><a href="{{ url('kantin-{id}-menu')}}">Menu</a></li>
                        <li class="active">About us </li>
                    </ul>
                </div>
            </div>
        </div>
<!-- Breadcrumb Area End -->
<!-- Product Deatils Area Start -->
<div class="product-details pt-100 pb-95">
            <div class="container">
                <div class="row">
                @foreach($join as $join)
                    <div class="col-lg-6 col-md-12">
                        <div class="product-details-img">
                            <img class="zoompro" src="{{ url('upload/sampul_kantin') }}/{{ $join->gambar }}" data-zoom-image="{{ url('upload/sampul_kantin') }}/{{ $join->gambar }}" alt="zoom"/>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="product-details-content">
                            <h4>{{$join->nama_menu}}</h4>
                            <div class="in-stock">
                                <p>Stok : <span>{{$join->stok}}</span></p>
                            </div>
                            <div class="pro-dec-feature">
                                <h5>{{$join->deskripsi}}</h5>
                            </div>
                            <div class="pro-dec-categories">
                                <ul>
                                    <li class="categories-title">Kategori : </li>
                                    <li>{{$join->nama_jenis}}</li>
                                </ul>
                            </div>
                                <div class="shop-cart">
                                    <a title="Add To Cart" href="{{ url('pesan-' . $join->id) }}">
                                        <br>
                                        <i class="fas fa-shopping-cart"> Add to cart</i>
                                    </a>
                                </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
		<!-- Product Deatils Area End -->

@stop