
@extends('template')
@section('main')
@include('header')
		<!-- Slider Start -->
        <div class="slider-area">
            <div class="slider-active owl-dot-style owl-carousel">
                <div class="single-slider ptb-240 bg-img" style="background-image:url(assets/img/slider/geprek-1.jpg);">
                    <div class="container">
                        <div class="slider-content slider-animated-1">
                            <h1 class="animated"><span class="theme-color"></span></h1>
                            <h1 class="animated"></h1>
                            <p></p>
                        </div>
                    </div>
                </div>
        </div>
		<!-- Slider End -->
		<!-- Banner Start -->
        <div class="banner-area pt-100 pb-70">
            <div class="container">
                <div class="banner-wrap">
                    <div class="row">
                    @if($kantin->count() > 1)
                    @foreach($kantin as $k)
                        <div class="col-lg-6 col-md-6">
                            <div class="single-banner img-zoom mb-30">
                                <a href="{{url('kantin-'.$k->id.'-menu')}}">
                                    <img src="{{ url('upload/sampul_kantin') }}/{{ $k->gambar }}" alt="" width="" height="">
                                </a>
                                <div class="banner-content" style="background-color:rgba(53, 40, 19, 0.76)">
                                    <h5 style="color:rgba(241, 246, 229, 1)">{{$k->nama_kantin}}</h5>
                                    <p style="color:rgba(241, 246, 229, 1)">{{$k->nama_penjual}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @elseif($kantin->count() == 1)
                    <div class="col-lg-6 col-md-6">
                            <div class="single-banner img-zoom mb-30">
                                <a href="{{url('kantin-'.$kantin->id.'-menu')}}">
                                    <img src="{{ url('upload/sampul_kantin') }}/{{ $k->gambar }}" alt="" width="" height="">
                                </a>
                                <div class="banner-content" style="background-color:rgba(53, 40, 19, 0.76)">
                                    <h5 style="color:rgba(241, 246, 229, 1)">{{$k->nama_kantin}}</h5>
                                    <p style="color:rgba(241, 246, 229, 1)">{{$k->nama_penjual}}</p> 
                                </div>
                            </div>
                        </div>
                    @else
                    <p>tidak ada kantin terdaftar</p>
                    @endif
                    </div>
                    @if(Session::get('level')=='admin')
                    <center>
                    <div class="row">
                                <div class="col-lg-12">
                                        <div class="cart-shiping-update">
                                            <a href="{{ url('kantin-' . $k->id . '-edit') }}">Edit</a>
                                            <a href="{{ url('kantin-' . $k->id . '-delete') }}" onclick="return confirm('Are you sure you want to delete this data?')">Delete</a>
                                            <a href="{{ url('kantin-create') }}">Tambah Kantin</a>
                                    </div>
                                </div>
                            </div>
                    </center>
                    @endif
                </div>
            </div>
        </div>
		<!-- Banner End -->
		<!-- all js here -->
        <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/ajax-mail.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
    </body>

</html>