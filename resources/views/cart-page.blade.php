@extends('template')
@section('main')
@include('header')
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-image-3 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>CART PAGE</h3>
                    <ul>
                        <li><a href="index">Home</a></li>
                        <li class="active">Cart page</li>
                    </ul>
                </div>
            </div>
        </div>
		<!-- Breadcrumb Area End -->
         <!-- shopping-cart-area start -->
        <div class="cart-main-area ptb-100">
            <div class="container">
                <h3 class="page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                        <th>id</th>
                                            <th>Nama Menu</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Cart::getcontent() as $c)
                                        <tr>
                                            <td class="product-name"><a href="#">{{$c->id}}</a></td>
                                            <td class="product-name"><a href="#">{{$c->name}}</a></td>
                                            <td class="product-name"><a href="#">{{$c->price}}</a></td>
                                            <td class="product-quantity">
                                                <div class="pro-dec-cart">
                                                    <input class="cart-plus-minus-box" type="text" value="{{$c->quantity}}" name="qtybutton">
                                                </div>
                                            </td>
                                            <td class="product-price-cart"><span class="amount">{{Cart::getTotal()}}</span></td>
                                            
                                            <td class="product-remove">
                                                <a href="{{ url('hapus-' . $c->id)}}"><i class="fa fa-times"></i></a>
                                           </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="index">Continue Shopping</a>
                                        </div>
                                        <div class="cart-clear">
                                            <a href="{{ url('hapus')}}">Clear Shopping Cart</a>
                                        </div>
                                        <div class="cart-clear">
                                            <a href="#">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
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