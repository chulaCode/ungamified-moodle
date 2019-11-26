<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CMPE GAMIFIED</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
	<!-- Icomoon Icon Fonts-->
    <link href="{{ asset('css/icomoon.css') }}" rel="stylesheet">
	<!-- Magnific Popup -->
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
	<!-- Flexslider  -->
    <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet">
	<!-- Owl Carousel -->
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
	<!-- Flaticons  -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css.map') }}" rel="stylesheet">
 
	<!-- Theme style  -->

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
    <!-- 
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif   
        </div>
        -->

	<div class="colorlib-loader"></div>

<div id="page">
    <nav class="colorlib-nav" role="navigation">
    <div class="upper-menu">
            <div class="container">
                <div class="row">
                    <div class="col-xs-4">
                        <P> CMPE 101 (Binary NUmber System)</P>
                    </div>
                    <div>
                    @include('partials.alert');
                    </div>
                </div>
            </div>
        </div>
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div id="colorlib-logo"><a href="index.html">
                        Introduction To Computing</a></div>
                    </div>
                    <div class="col-md-6 text-right">
                    
                        <ul >
                        @if(Route::has('login'))
                        <div class="top-right links">
                         @auth
                        <p style="color:white; font-weight: bold;">You're logged in click on course button to go to course homepage</p>
                        
                         @else
                            <li> <a href="{{ route('register') }}">Register</a></li>
                            <li class="btn-cta"> <a href="{{ route('login') }}"><span style="background-color:#b61924">Login</span></a></li>
                            @endif
                            @endauth
                        </ul>
                        
                       
                    </div>
                    
                     
                </div>
            </div>
        </div>
    </nav>
    <aside id="colorlib-hero">
        <div class="flexslider">
            <ul class="slides">
               <li class="img-fluid" style="background-image: url(images/img_bg_1.jpg);">
                   <div class="overlay"></div>
                   <div class="container-fluid">
                       <div class="row">
                           <div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 col-md-pull-1 slider-text">
                               <div class="slider-text-inner">
                                   <div class="desc">
                                       <h2>You only have to know one thing</h2>
                                      <h1>book is the way </h1>
                                      <form action="/enrol" method="get">
                                         @csrf
                                       <p><button type="submit" name="submit" value="enrol"style="" class="btn btn-danger btn-lg">
                                       
                                       <span class="icon"><i class="fas fa-graduation-cap"></i></span>Course</button></p>
                                       </form>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </li>
               <li class="img-fluid" style="background-image: url(images/img_bg_5.jpg);">
                   <div class="overlay"></div>
                   <div class="container-fluid">
                       <div class="row">
                           <div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 col-md-pull-1 slider-text">
                               <div class="slider-text-inner">
                                   <div class="desc">
                                       <h2>You only have to know one thing</h2>
                                       <h1>Learn and create a good world</h1>
                                       <form action="/enrol" method="get">
                                         @csrf
                                       <p><button type="submit" name="submit" value="enrol" class="btn btn-danger btn-lg">
                                       
                                       <span class="icon"><i class="fas fa-graduation-cap"></i></span>Course</button></p>
                                       </form>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </li>
               <li class="img-fluid" style="background-image: url(images/img_bg_3.jpg); ">
                   <div class="overlay"></div>
                   <div class="container-fluid">
                       <div class="row">
                           <div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 col-md-pull-1 slider-text">
                               <div class="slider-text-inner">
                                   <div class="desc">
                                       <h2>You only have to know one thing</h2>
                                       <h1>Education is a Key to Success</h1>
                                       <form action="/enrol" method="get">
                                         @csrf
                                       <p><button type="submit" name="submit" value="enrol" class="btn btn-danger btn-lg">
                                       
                                       <span class="icon"><i class="fas fa-graduation-cap"></i></span>Course</button></p>
                                       </form>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </li>
               <li class="img-fluid" style="background-image: url(images/img_bg_4.jpg);">
                   <div class="overlay"></div>
                   <div class="container-fluid">
                       <div class="row">
                           <div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 col-md-pull-1 slider-text">
                               <div class="slider-text-inner">
                                   <div class="desc">
                                       <h2>You only have to know one thing</h2>
                                       <h1>learning is fun when is consistent</h1>
                                       <p><button class="btn btn-danger btn-lg">
                                       <span class="icon"><i class="fas fa-graduation-cap"></i></span>Course</button></p>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </li>	
              </ul>
          </div>
    </aside>
    <!-- end of carousal -->
    <div class="colorlib-classes ">
			<div class="container">
				<div class="row">
					<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
						<h1 class="heading-big">Learn and learn that's the way to go! Keep Pushing</h1>
						<h2>Learn and learn that's the way to go! Keep Pushing.</h2>
					</div>
				</div>
            </div>	
     </div>
     
   
      <!-- ending div -->
    </div>
    
    <footer id="colorlib-footer">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<p>
								<small class="block">&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | coder <i class="icon-heart" aria-hidden="true"></i> Ochulaobari Emmanuel
              </small><br> 
								
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	
        <!-- jQuery -->
	<script src="js/jquery.min.js"></script>
    
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Waypoints -->
	<script src="js/waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/stellar.min.js"></script>
	<!-- Flexslider -->
	<script src="js/flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/carousal.js"></script>
	<!-- Magnific Popup -->
	<script src="js/magnitic-popup.min.js"></script>
	<script src="js/magnific-popup.js"></script>
	<!-- Counters -->
	<script src="js/count.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

    </body>
</html>
