<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/bootstrap.min.css">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/main.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/blue.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/owl.transitions.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/rateit.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ asset('backend/lib/toastr/toastr.min.css') }}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/font-awesome.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">

        <!-- ============================================== TOP MENU ============================================== -->
        <div class="top-bar animate-dropdown">
            <div class="container">
                <div class="header-top-inner">
                    <div class="cnt-account">
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>
                            <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                            <li><a href="#"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                            <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>
                            @auth
                                <li><a href="{{ route('user.dashboard') }}"><i class="icon fa fa-lock"></i>
                                        <img src="{{ asset(Auth::user()->image) }}" alt=""
                                            style="width: 30px;height:30px;border-radius:100%">
                                    </a></li>


                                {{-- <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                        <i class="icon ion-power"></i>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li> --}}
                            @else
                                <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Login</a></li>
                            @endauth

                        </ul>
                    </div><!-- /.cnt-account -->

                    <div class="cnt-block">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown"
                                    data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown"
                                    data-toggle="dropdown"><span class="value">
                                        @if (session()->get('language') == 'bangla')
                                            ভাষা পরিবর্তন করুন
                                        @else
                                            Language
                                        @endif
                                    </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    @if (session()->get('language') == 'bangla')
                                        <li><a href="{{ route('language.english') }}">English</a></li>
                                    @else
                                    @endif
                                    <li><a href="{{ route('language.bangla') }}">Bangla</a></li>
                                </ul>
                            </li>
                        </ul><!-- /.list-unstyled -->
                    </div><!-- /.cnt-cart -->
                    <div class="clearfix"></div>
                </div><!-- /.header-top-inner -->
            </div><!-- /.container -->
        </div><!-- /.header-top -->
        <!-- ============================================== TOP MENU : END ============================================== -->
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                        <!-- ============================================================= LOGO ============================================================= -->
                        <div class="logo">
                            <a href="{{ url('/') }}">

                                <img src="{{ asset('front') }}/assets/images/logo.png" alt="">

                            </a>
                        </div><!-- /.logo -->
                        <!-- ============================================================= LOGO : END ============================================================= -->
                    </div><!-- /.logo-holder -->

                    <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                        <!-- /.contact-row -->
                        <!-- ============================================================= SEARCH AREA ============================================================= -->
                        <div class="search-area">
                            <form>
                                <div class="control-group">

                                    <ul class="categories-filter animate-dropdown">
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown"
                                                href="category.html">Categories <b class="caret"></b></a>

                                            <ul class="dropdown-menu" role="menu">
                                                <li class="menu-header">Computer</li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                        href="category.html">- Clothing</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                        href="category.html">- Electronics</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                        href="category.html">- Shoes</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                        href="category.html">- Watches</a></li>

                                            </ul>
                                        </li>
                                    </ul>

                                    <input class="search-field" placeholder="Search here..." />

                                    <a class="search-button" href="#"></a>

                                </div>
                            </form>
                        </div><!-- /.search-area -->
                        <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                    </div><!-- /.top-search-holder -->

                    <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                        <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                        <div class="dropdown dropdown-cart">
                            <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                                <div class="items-cart-inner">
                                    <div class="basket">
                                        <i class="glyphicon glyphicon-shopping-cart"></i>
                                    </div>
                                    <div class="basket-item-count"><span class="count">2</span></div>
                                    <div class="total-price-basket">
                                        <span class="lbl">cart -</span>
                                        <span class="total-price">
                                            <span class="sign">$</span><span class="value">600.00</span>
                                        </span>
                                    </div>


                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="cart-item product-summary">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="image">
                                                    <a href="detail.html"><img
                                                            src="{{ asset('front') }}/assets/images/cart.jpg"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                            <div class="col-xs-7">

                                                <h3 class="name"><a href="index8a95.html?page-detail">Simple
                                                        Product</a></h3>
                                                <div class="price">$600.00</div>
                                            </div>
                                            <div class="col-xs-1 action">
                                                <a href="#"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div><!-- /.cart-item -->
                                    <div class="clearfix"></div>
                                    <hr>

                                    <div class="clearfix cart-total">
                                        <div class="pull-right">

                                            <span class="text">Sub Total :</span><span class='price'>$600.00</span>

                                        </div>
                                        <div class="clearfix"></div>

                                        <a href="checkout.html"
                                            class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                    </div><!-- /.cart-total-->


                                </li>
                            </ul><!-- /.dropdown-menu-->
                        </div><!-- /.dropdown-cart -->

                        <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                    </div><!-- /.top-cart-row -->
                </div><!-- /.row -->

            </div><!-- /.container -->

        </div><!-- /.main-header -->

        <!-- ============================================== NAVBAR ============================================== -->
        <div class="header-nav animate-dropdown">
            <div class="container">
                <div class="yamm navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                            class="navbar-toggle collapsed" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="nav-bg-class">
                        <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                            <div class="nav-outer">
                                <ul class="nav navbar-nav">
                                    <li class="active dropdown yamm-fw">
                                        <a href="{{ url('/') }}" data-hover="dropdown" class="dropdown-toggle"
                                            data-toggle="dropdown">Home</a>

                                    </li>
                                    @php
                                        $categories = App\Models\Category::orderBy('category_name_en', 'asc')->get();
                                    @endphp
                                    @foreach ($categories as $category)
                                        <li class="dropdown yamm mega-menu">
                                            <a href="home.html" data-hover="dropdown" class="dropdown-toggle"
                                                data-toggle="dropdown">{{ $category->category_name_en }}</a>
                                            <ul class="dropdown-menu container">
                                                <li>
                                                    <div class="yamm-content ">
                                                        <div class="row">
                                                            @php
                                                                $subcategories = App\Models\Subcategory::where('category_id', $category->id)
                                                                    ->orderby('subcategory_name_en', 'asc')
                                                                    ->get();
                                                            @endphp
                                                            @foreach ($subcategories as $subcategory)
                                                                <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                                    <h2 class="title">
                                                                        {{ ucwords($subcategory->subcategory_name_en) }}
                                                                    </h2>
                                                                    @php
                                                                        $childcategories = App\Models\Childcategory::where('subcategory_id', $subcategory->id)
                                                                            ->orderby('childcategory_name_en', 'asc')
                                                                            ->get();
                                                                    @endphp
                                                                    <ul class="links">
                                                                        @foreach ($childcategories as $childcategory)
                                                                            <li><a
                                                                                    href="#">{{ ucwords($childcategory->childcategory_name_en) }}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endforeach
                                                            <div
                                                                class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                                <img class="img-responsive"
                                                                    src="{{ asset('front') }}/assets/images/banners/top-menu-banner.jpg"
                                                                    alt="">
                                                            </div><!-- /.yamm-content -->
                                                        </div>
                                                    </div>

                                                </li>
                                            </ul>

                                        </li>
                                    @endforeach



                                </ul><!-- /.navbar-nav -->
                                <div class="clearfix"></div>
                            </div><!-- /.nav-outer -->
                        </div><!-- /.navbar-collapse -->


                    </div><!-- /.nav-bg-class -->
                </div><!-- /.navbar-default -->
            </div><!-- /.container-class -->

        </div><!-- /.header-nav -->
        <!-- ============================================== NAVBAR : END ============================================== -->

    </header>

    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">

            @yield('content')


            <!-- ============================================== BRANDS CAROUSEL ============================================== -->


            @include('frontend.inc.brand')
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /#top-banner-and-menu -->




    <!-- ============================================================= FOOTER ============================================================= -->
    <footer id="footer" class="footer color-bg">
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="module-heading">
                            <h4 class="module-title">Contact Us</h4>
                        </div><!-- /.module-heading -->

                        <div class="module-body">
                            <ul class="toggle-footer" style="">
                                <li class="media">
                                    <div class="pull-left">
                                        <span class="icon fa-stack fa-lg">
                                            <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p>ThemesGround, 789 Main rd, Anytown, CA 12345 USA</p>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="pull-left">
                                        <span class="icon fa-stack fa-lg">
                                            <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p>+(888) 123-4567<br>+(888) 456-7890</p>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="pull-left">
                                        <span class="icon fa-stack fa-lg">
                                            <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <span><a href="#">flipmart@themesground.com</a></span>
                                    </div>
                                </li>

                            </ul>
                        </div><!-- /.module-body -->
                    </div><!-- /.col -->

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="module-heading">
                            <h4 class="module-title">Customer Service</h4>
                        </div><!-- /.module-heading -->

                        <div class="module-body">
                            <ul class='list-unstyled'>
                                <li class="first"><a href="#" title="Contact us">My Account</a></li>
                                <li><a href="#" title="About us">Order History</a></li>
                                <li><a href="#" title="faq">FAQ</a></li>
                                <li><a href="#" title="Popular Searches">Specials</a></li>
                                <li class="last"><a href="#" title="Where is my order?">Help Center</a>
                                </li>
                            </ul>
                        </div><!-- /.module-body -->
                    </div><!-- /.col -->

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="module-heading">
                            <h4 class="module-title">Corporation</h4>
                        </div><!-- /.module-heading -->

                        <div class="module-body">
                            <ul class='list-unstyled'>
                                <li class="first"><a title="Your Account" href="#">About us</a></li>
                                <li><a title="Information" href="#">Customer Service</a></li>
                                <li><a title="Addresses" href="#">Company</a></li>
                                <li><a title="Addresses" href="#">Investor Relations</a></li>
                                <li class="last"><a title="Orders History" href="#">Advanced Search</a>
                                </li>
                            </ul>
                        </div><!-- /.module-body -->
                    </div><!-- /.col -->

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="module-heading">
                            <h4 class="module-title">Why Choose Us</h4>
                        </div><!-- /.module-heading -->

                        <div class="module-body">
                            <ul class='list-unstyled'>
                                <li class="first"><a href="#" title="About us">Shopping Guide</a></li>
                                <li><a href="#" title="Blog">Blog</a></li>
                                <li><a href="#" title="Company">Company</a></li>
                                <li><a href="#" title="Investor Relations">Investor Relations</a></li>
                                <li class=" last"><a href="contact-us.html" title="Suppliers">Contact Us</a></li>
                            </ul>
                        </div><!-- /.module-body -->
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright-bar">
            <div class="container">
                <div class="col-xs-12 col-sm-6 no-padding social">
                    <ul class="link">
                        <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#"
                                title="Facebook"></a></li>
                        <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#"
                                title="Twitter"></a></li>
                        <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#"
                                title="GooglePlus"></a></li>
                        <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#"
                                title="RSS"></a></li>
                        <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#"
                                title="PInterest"></a></li>
                        <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#"
                                title="Linkedin"></a></li>
                        <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#"
                                title="Youtube"></a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 no-padding">
                    <div class="clearfix payment-methods">
                        <ul>
                            <li><img src="{{ asset('front') }}/assets/images/payments/1.png" alt=""></li>
                            <li><img src="{{ asset('front') }}/assets/images/payments/2.png" alt=""></li>
                            <li><img src="{{ asset('front') }}/assets/images/payments/3.png" alt=""></li>
                            <li><img src="{{ asset('front') }}/assets/images/payments/4.png" alt=""></li>
                            <li><img src="{{ asset('front') }}/assets/images/payments/5.png" alt=""></li>
                        </ul>
                    </div><!-- /.payment-methods -->
                </div>
            </div>
        </div>
    </footer>
    <!-- ============================================================= FOOTER : END============================================================= -->

    <!-- Modal -->
    <div class="modal fade" id="cart_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong id="product_name"></strong></h5>
                    <button type="button" class="close" data-dismiss="modal" id="closeModal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <img src="" id="product_image" alt=""
                                    style="width: 200px;height:200px">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <ul class="list-group">
                                <li class="list-group-item">Price : <Strong class="text-danger"><span
                                            id="product_price"></span></Strong>
                                    <del id="old_price"></del>
                                </li>
                                <li class="list-group-item">Product Code : <strong id="product_code"></strong></li>
                                <li class="list-group-item">Category : <strong id="category"></strong></li>
                                <li class="list-group-item">Brand : <strong id="brand"></strong></li>
                                <li class="list-group-item">Stock :
                                    <span class="badge badge-pill" id="avaliable"></span>
                                    <span class="badge badge-danger" id="stockout"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group" id="colorArea">
                                <label for="color">Select Color</label>
                                <select name="color" id="color" class="form-control">

                                </select>
                            </div>
                            <div class="form-group" id="sizeArea">
                                <label for="size">Select Size</label>
                                <select name="size" id="size" class="form-control">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="text" name="quantity" id="quantity" class="form-control"
                                    value="1" min="1">
                            </div>
                            <input type="hidden" id="product_id">
                            <input type="submit" class="btn btn-success" onclick="addToCart()" value="Add to Cart">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('front') }}/assets/js/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('front') }}/assets/js/bootstrap.min.js"></script>

    <script src="{{ asset('front') }}/assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="{{ asset('front') }}/assets/js/owl.carousel.min.js"></script>

    <script src="{{ asset('front') }}/assets/js/echo.min.js"></script>
    <script src="{{ asset('front') }}/assets/js/jquery.easing-1.3.min.js"></script>
    <script src="{{ asset('front') }}/assets/js/bootstrap-slider.min.js"></script>
    <script src="{{ asset('front') }}/assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="{{ asset('front') }}/assets/js/lightbox.min.js"></script>
    <script src="{{ asset('front') }}/assets/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('front') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('front') }}/assets/js/scripts.js"></script>
    <script src="{{ asset('backend/lib/toastr/toastr.min.js') }}"></script>

    <script>
        @if (Session::has('message'))
            let type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // product view modal
        function productView(id) {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'product/view/modal/' + id,
                success: function(data) {
                    $('#product_name').text(data.product.product_name_en);
                    $('#price').text(data.product.selling_price);
                    $('#product_code').text(data.product.product_code);
                    $('#category').text(data.product.category.category_name_en);
                    $('#brand').text(data.product.brand.brand_name_en);
                    $('#stock').text(data.product.product_qty);
                    $('#product_image').attr('src', '/' + data.product.product_thumbnail);
                    $('#product_id').val(id);
                    $('#quantity').val(1);

                    // price
                    if (data.product.discount == '') {
                        $('#product_price').text('');
                        $('#old_price').text('');
                        $('#product_price').text(data.product.selling_price);
                    } else {
                        $('#product_price').text(data.product.discount_price);
                        $('#old_price').text(data.product.selling_price);
                    }

                    // stock
                    if (data.product.product_qty > 0) {
                        $('#avaliable').text('');
                        $('#stockout').text('');
                        $('#avaliable').text('avaliable');
                    } else {
                        $('#avaliable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('stockout');
                    }

                    $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value="' + value +
                            '">' + value + '</option>')
                        if (data.size == '') {
                            $('#colorArea').hide();
                        } else {
                            $('#colorArea').show();
                        }
                    })

                    $('select[name="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value="' + value +
                            '">' + value + '</option>')
                        if (data.size == '') {
                            $('#sizeArea').hide();
                        } else {
                            $('#sizeArea').show();
                        }
                    })
                }
            })
        }

        // addtocart 
        function addToCart() {
            let id = $('#product_id').val();
            let product_name = $('#product_name').text();
            let color = $('#color option:selected').text();
            let size = $('#size option:selected').text();
            let quantity = $('#quantity').val();

            $.ajax({
                type: 'post',
                dataType: 'json',
                data: {
                    product_name: product_name,
                    color: color,
                    size: size,
                    quantity: quantity,
                },
                url: 'cart/data/store/' + id,
                success: function(data) {
                    $('#closeModal').click();
                    console.log(data);
                }
            })
        }
    </script>

</body>

</html>
