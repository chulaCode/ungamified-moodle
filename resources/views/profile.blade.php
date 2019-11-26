
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cmpe 101') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/particle.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/background.css') }}" rel="stylesheet">
   <!-- <link href="{{ asset('css/popup.css') }}" rel="stylesheet">-->
   <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
</head>
<body>
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" style="color:white" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="color:white" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
 
       
        <div id="particles-js">
         <div class="container-fluid" >
            <div class="row">
                  <div class="sidebar col-md-3 col-sm-12 col-lg-3 ml-md-0 mr-md-2">
                      
                      <div class="mb-3"> 
                        
                            <div id="profileimage"><img src="{{ $user->profileImage() }}" class="rounded-circle w-50 pb-2 mx-lg-5 mx-md-4" alt=""/></div>
                            <div class=" h4 mx-lg-5 px-lg-5 mx-md-4" id="username">  {{$user->username}}  </div>

                            <div id="edit"> <a href="/profile/{{$user->id}}/edit"><button class="btn btn-danger mb-3 mx-lg-5 px-lg-3 mx-md-2 px-md-1">Edit your Profile</button></a> </div>
                            
                            <hr class="line">
                            <p class="content-text">After studying lecture notes you can proceed to question section by click try out question button  to try your knowledge of binary numbering system!</p>
                            <div class="question"><a href="/post/{{$user->id}}"><button class="btn btn-danger mx-lg-5 px-lg-4 mx-md-4 my-4">Try out questions</button></a> </div>
                     </div>
                    <!-- end of col-3  <h5><a href="/profile/create">Add New Post</a></h5> -->
                   </div>
                   <!-- closing tag for row-->
              </div>
              
          <!-- beginning of column 9 -->
           <div class=" right col-md-9  col-sm-12 mr-5">
             
               <div class="row"> 
                 <div class="col-md-9 col-9 col-sm-10">
                        @if (session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                        @endif
                          <!--<h5><a href="/profile/create">Add New Post</a></h5>-->
                        
                    </div>
               </div>
                  <div>
                    <div class="notes"> 
                         @foreach($lecture1 as $post)
                           <img src="/uploads/{{$post->image }}" class="img-fluid" alt="image">
                          @endforeach
                          <div class="row">
                            <div class="col-12 d-flex justify-content-center my-2">
                             {{ $lecture1->links() }}
                            </div>
                          </div>
                   
                    </div>
                 </div>
              </div>
         
          <!-- end of col-9   -->
      </div>
      
      <!-- end of row -->
     
    </div>
<div>
</body>
</html>  


