
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Shift Shop | Home</title>
    
    <!-- Font awesome -->
    <link href="{{asset('front_assets/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('front_assets/css/bootstrap.css')}}" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{asset('front_assets/css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/jquery.simpleLens.css')}}">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/slick.css')}}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/nouislider.css')}}">
    <!-- Theme color -->
    <link id="switcher" href="{{asset('front_assets/css/theme-color/default-theme.css')}}" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="{{asset('front_assets/css/sequence-theme.modern-slide-in.css')}}" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{asset('front_assets/css/style.css')}}" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    
    <script>
      var PRODUCTIMAGE="{{asset('storage/images/')}}";
    </script>

  </head>
  <body class="productPage"> 
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              
              <div class="aa-header-top-left">
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>+977 984551166</p>
                </div>
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li><a href="javascript:void(0)">My Account</a></li>
                  <li class="hidden-xs"><a href="javascript:void(0)">Wishlist</a></li>
                  <li class="hidden-xs"><a href="/cart">My Cart</a></li>
                  <li class="hidden-xs"><a href="checkout">Checkout</a></li>
                  
                @if(session()->has('FRONT_USER_LOGIN')!=null)  
                  <li><a href="{{url('logout')}}" >Logout</a></li>
                @else
                <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    >
    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="{{('/')}}">
                  <span class="fa fa-shopping-cart"></span>
                  <p>Shift<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="javascript:void(0)"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
               @php 
                  $cartinfo=getdatafromcart();
                  $number=count($cartinfo);
                  $totalprice=0;
               @endphp
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  <span class="aa-cart-notify">{{ $number}}</span>
                </a>
                <div class="aa-cartbox-summary">
                @if($number>0)
                  <ul>
                  @foreach($cartinfo as $list)
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="{{asset('storage/images/'.$list->image)}}" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#"> {{$list->product_name}}</a></h4>
                        <p>{{$list->qty}} x Rs{{$list->price}}</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>
                   @php
                    $totalprice=$totalprice+($list->qty*$list->price);
                   @endphp
                  @endforeach                 
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        Rs{{$totalprice}}
                      </span>
                    </li>
                  </ul>
                  @endif
                  <a class="aa-cartbox-checkout aa-primary-btn" href="checkout">Checkout</a>
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="{{route('front.seaarch')}}" method='post'>
                  @csrf
                  <input type="text" name="search_filter" id="search_filter" placeholder="Search here ex. 'mobile' ">
                  <button type="submit"><span class="fa fa-search" ></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            {!! buildtree() !!}
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->
  @section('container')
  @show()
  <!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Our Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Delivery</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Discount</a></li>
                      <li><a href="#">Special Offer</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Site Map</a></li>
                      <li><a href="#">Search</a></li>
                      <li><a href="#">Advanced Search</a></li>
                      <li><a href="#">Suppliers</a></li>
                      <li><a href="#">FAQ</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> 1400,Hetauda, Makawanpur-5, Nepal</p>
                      <p><span class="fa fa-phone"></span>+984559909</p>
                      <p><span class="fa fa-envelope"></span>shiftshop@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    
  </footer>
  <!-- / footer -->

  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <div id="login_form_1">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          @php
            if(isset($_COOKIE['login_email']) && isset($_COOKIE['login_password'])){
              $login_email=$_COOKIE['login_email'];
              $login_password=$_COOKIE['login_password'];
              $rememberme='checked';
            }
              
            else{
              $login_email='';
              $rememberme='';
              $login_password='';
            }
              
            

          @endphp
          <form class="aa-login-form" action="" id="login_details">
          @csrf
            <label for="">Username or Email address<span>*</span></label>
            <input type="text" name="email" value="{{$login_email}}" id="email" placeholder="Username or email">
            <label for="">Password<span>*</span></label>
            <input type="password" name="password" value="{{$login_password}}" id="password" placeholder="Password">
            <button class="aa-browse-btn" type="submit"  >Login</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" {{$rememberme}} id="rememberme" name="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="#" onclick="lost()" data-toggle="modal" data-target="#exampleModal">Lost your password?</a></p>
            <span id="login_warning"></span>
            <div class="aa-register-now">
              Don't have an account?<a href="registration">Register now!</a>
            </div>
          </form>
        </div>
        <div id="forgot_form" style="display:none;">
        <form class="aa-login-form" action="" id="forgot_pass">
          @csrf
            <label for=""> Email address<span>*</span></label>
            <input type="text" name="email" id="email" placeholder="email">
            
            <button class="aa-browse-btn" type="submit"  >Submit</button>
            <br>
            <span id="pass_rest" class="activate_categry"></span>
            <div class="aa-register-now">
              To Login<a href="javascript:void(0)" onclick="showing_login_form()">login</a>
            </div>
          </form>
        </div>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>    

  
</div>

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{asset('front_assets/js/bootstrap.js')}}"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.smartmenus.js')}}"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.smartmenus.bootstrap.js')}}"></script>  
  <!-- To Slider JS -->
  <script src="{{asset('front_assets/js/sequence.js')}}"></script>
  <script src="{{asset('front_assets/js/sequence-theme.modern-slide-in.js')}}"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.simpleGallery.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.simpleLens.js')}}"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="{{asset('front_assets/js/slick.js')}}"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{asset('front_assets/js/nouislider.js')}}"></script>
  <!-- Custom js -->
  <script src="{{asset('front_assets/js/custom.js')}}"></script> 

  </body>
</html>