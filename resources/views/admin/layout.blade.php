<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
  
    
    

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('admin_assets/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Bootstrap CSS-->
    <link href="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('admin_assets/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('admin_assets/css/theme.css')}}" rel="stylesheet" media="all">
    

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{asset('admin_assets/images/icon/logo.png')}}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class=" @yield('dashboard_select')">
                            <a class="js-arrow" href="{{asset('admin/dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            
                        </li>
                        <li class="@yield('category_select')">
                            <a href="{{asset('admin/category')}}">
                                <i class="fas fa-chart-bar"></i>Category</a>
                        </li>
                        <li class="@yield('coupon_select')">
                            <a href="{{asset('admin/coupon')}}">
                                <i class="fas fa-solid fa-tag"></i>Coupon</a>
                        </li>
                        <li class="@yield('brand_select')">
                            <a href="{{asset('admin/brand')}}">
                                <i class="fas fa-solid fa-p"></i>brand</a>
                        </li>
                        <li class="@yield('size_select')">
                            <a href="{{asset('admin/size')}}">
                                <i class="fas fa-solid fa-text-size"></i>Size</a>
                        </li>
                        <li class="@yield('color_select')">
                            <a href="{{asset('admin/color')}}">
                                <i class=" fa fa-"></i>Color</a>
                        </li>
                        <li class="@yield('tax_select')">
                            <a href="{{asset('admin/tax')}}">
                                <i class=" fas fa-solid fa-paintbrush"></i>Tax</a>
                        </li>
                        <li class="@yield('customer_select')">
                            <a href="{{asset('admin/product')}}">
                                <i class=" fas fa-solid fa-user"></i>Customer</a>
                        </li>
                        <li class="@yield('banner_select')">
                            <a href="{{asset('admin/banner')}}">
                                <i class=" fas fa-solid fa-paintbrush"></i>Banner</a>
                        </li>
                        </li>
                        <li class="@yield('product_select')">
                            <a href="{{asset('admin/product')}}">
                                <i class=" fas fa-solid fa-paintbrush"></i>Product</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                <span style="color:black; font-size:30px;font-weight:bold">Admin</span>
                    <!--<img src="{{asset('admin_Assets/images/icon/logo.png')}}" alt="Cool Admin" />-->
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class=" has-sub @yield('dashboard_select')">
                            <a class="js-arrow" href="{{asset('admin/dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            
                        </li>
                        
                        <li class="@yield('category_select')">
                            <a href="{{asset('admin/category')}}">
                                <i class="fas fa-table"></i>Category</a>
                        </li>
                        <li class="@yield('coupon_select')">
                            <a href="{{asset('admin/coupon')}}">
                                <i class="fas fa-solid fa-tag"></i>Coupon</a>
                        </li>
                        <li class="@yield('brand_select')">
                            <a href="{{asset('admin/brand')}}">
                                <i class="fas fa-solid fa-p"></i>brand</a>
                        </li>
                        <li class="@yield('size_select')">
                            <a href="{{asset('admin/size')}}">
                            <i class="fa-solid fa-maximize"></i>Size</a>
                        </li>
                        <li class="@yield('color_select')">
                            <a href="{{asset('admin/color')}}">
                                <i class="fsa fa-solid fa-paint-roller"></i>Color</a>
                        </li>
                        <li class="@yield('tax_select')">
                            <a href="{{asset('admin/tax')}}">
                                <i class=" fas fa-solid fa-paintbrush"></i>Tax</a>
                        </li>
                        <li class="@yield('customer_select')">
                            <a href="{{asset('admin/customer')}}">
                                <i class=" fas fa-solid fa-user"></i>Customer</a>
                        </li>
                        <li class="@yield('banner_select')">
                            <a href="{{asset('admin/banner')}}">
                                <i class=" fas fa-solid fa-paintbrush"></i>Banner</a>
                        </li>
                        <li class="@yield('product_select')">
                            <a href="{{asset('admin/product')}}">
                            <i class="fa-brands fa-product-hunt"></i>Product</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    
                                    
                                    
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Ayushman</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            
            <!-- END PAGE CONTAINER-->
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                            @section('container')
                            @show()
                    </div>
                </div>
            </div>


    </div>

    <!-- Jquery JS-->
    <script src="{{asset('admin_assets/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('admin_assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('admin_assets/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('admin_assets/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('admin_assets/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('admin_assets/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('admin_assets/js/main.js')}}"></script>
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'short_desc' );
        CKEDITOR.replace( 'desc' );
    </script>
    

</body>

</html>
<!-- end document-->
