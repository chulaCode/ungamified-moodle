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
    <style>
        @media screen and (min-width : 320px) and (max-width : 480px) {
        .customLink{
        color:#fa4252!important;
    }
}
    </style>
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
                        <P>CMPE 101 (Binary Number System)</P>
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
                        <div id="colorlib-logo"><a href="/">
                        Introduction To Computing </a></div>
                    </div>
                    <div class="col-md-6 text-right">
                    
                        <ul >
                        <div class="top-right links">
                        @if(strcmp($enrol, "false"))
                        <h4 class=""><a href="/profile/{{$user->id}}" style="color:white" class="customLink">profile</a></h4>
                        @else
                        <p style="color:white; font-weight: bold;">You need to enrol in course to view materials thanks!</p>
                        @endif
                        <!--
                        @if(isset($_POST["enrol"]))
                        <h4><a href="/profile/{{$user->id}}">profile</a></h4>
                         @else
                         <p style="color:white; font-weight: bold;">You need to enrol in course to view materials thanks!</p>
                        
                          @endif
                          -->
                        </ul>
                        
                       
                    </div>
                    
                     
                </div>
            </div>
        </div>
    </nav>
    <aside id="colorlib-hero">
        <div class="flexslider">
            <ul class="slides">
               <li class="img-fluid" style="background-image: url(/images/b5.jpg);">
          
                   <div class="overlay"></div>
                   <div class="container-fluid">
                       <div class="row">
                           <div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 col-md-pull-1 slider-text">
                               <div class="slider-text-inner">
                                   <div class="desc">
                                      <div style="">
                                       <!--<h2 style="color:white; ">You only have to know one thing</h2>-->
                                      <h1 style="color:white; ">“Be consistent wıth learnıng.”</h1>
                                      </div>
                                      <form action="/profile/{{$user->id}}" method="post">
                                         @csrf
                                         <div>
                                         @if(strcmp($enrol, "true"))
                                         <button type="submit" name="submit" value="enrol" class="btn btn-danger btn-lg">
            
                                         <span class="icon"><i class="fas fa-graduation-cap"></i></span> Enrol Now</button>
                                         @else
                                         <button type="submit" name="submit" value="unenrol" class="btn btn-danger btn-lg">
                                         <span class="icon"><i class="fas fa-graduation-cap"></i></span>Unenrol me</button>
                                         @endif
                                       </div>
                                       </form>
                             

                                     
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
        <!-- end of contents -->
   
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
	<script src="/js/jquery.min.js"></script>
    
	<!-- jQuery Easing -->
	<script src="/js/jquery.easing.1.3.js"></script>
	<!-- Waypoints -->
	<script src="/js/waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="/js/stellar.min.js"></script>
	<!-- Flexslider -->
	<script src="/js/flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="/js/carousal.js"></script>
	<!-- Magnific Popup -->
	<script src="/js/magnitic-popup.min.js"></script>
	<script src="/js/magnific-popup.js"></script>
	<!-- Counters -->
	<script src="/js/count.js"></script>
	<!-- Main -->
	<script src="/js/main.js"></script>

    </body>
</html>
