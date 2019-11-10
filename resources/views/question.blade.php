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
    <script src="{{ asset('js/timer.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/background.css') }}" rel="stylesheet">
    <link href="{{ asset('css/radio.css') }}" rel="stylesheet">
   <!-- <link href="{{ asset('css/popup.css') }}" rel="stylesheet">-->
   <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <!-- p5.js library -->
   <script language="javascript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.9.0/p5.min.js"></script>
  <script language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.9.0/addons/p5.dom.min.js"></script>
  <script language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.9.0/addons/p5.sound.min.js"></script>
</head>
<body>
   <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Cmpe 101') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
         <div class="container-fluid">
            <div class="row">
         
                  <div class="sidebar col-md-3 col-sm-12 col-lg-3 mr-5">
                      
                     <div class="mb-3"> 
                        
                        <div id="profileimage"><img src="{{ $user->profileImage() }}" class="rounded-circle w-50 pb-2 mx-lg-5 mx-md-4" alt=""/></div>
                        <div class=" h4 mx-lg-5 px-lg-5 mx-md-4" id="username">  {{$user->username}}  </div>

                        <div id="edit"> <a href="/profile/{{$user->id}}"><button class="btn btn-danger mb-2 mx-lg-2 px-lg-5 mx-md-4">Go Back to Profile</button></a> </div>
                        <hr>
                        
                        
                         <div id="clockdiv">

                            <div class="ml-5">
                                 <span id="timer">02:00</span>
                                 <div class="smalltext">Timer</div>
                             </div>
                         </div>
                         <div class="mt-2">
                             <p class="text-dark"> Note: You have maximum of 10 attempts in all and 2 minutes for each question! </p>
                         </div>
                                                        
                     </div>
          <!-- end of col-3 -->
                   </div>
                   <!-- closing tag for row-->
              </div>
                 
          <!-- beginning of column 9 -->
          <div class="row">
              <div class=" right col-lg-8 col-md-9 col-sm-12 ">
                 
                    <div class="col-2 col-sm-6"> 
                     <div class="row"> 
                         <div class="text-white">
                         <p class="ml-5 pl-3">Wrong</p>
                            @if($count_value->wrong==0)
                                <div id="time"class="wrong-count border-dark rounded-left">
                                {{$count_value->wrong}}
                                </div> 
                            @else
                            <div id="time"class="wrong-count border-dark rounded-left">
                                {{$count_value->wrong}}
                             </div> 
                             @endif
                         </div>
                         <div class=" text-white ">
                           <p class="ml-5 pl-3">Attempts</p>
                             @if($count_value->attempts==0)
                                    <div id="time"class="wrong-count border-dark rounded-left">
                                    {{$count_value->attempts}}
                                    </div> 
                                @else
                                <div id="time"class="wrong-count border-dark rounded-left">
                                    {{$count_value->attempts}}
                                </div> 
                                @endif
                           
                         </div>
                         
                         <div class=" text-white ">
                           <p class="ml-5 pl-3">correct</p>
                           @if($count_value->right==0)
                                <div id="time"class="wrong-count border-dark rounded-left">
                                {{$count_value->right}}
                                </div> 
                            @else
                               <div class="correct-count rounded-right">
                                {{$count_value->right}}
                                </div>
                             @endif
                         </div>

                      </div> 
                    </div>
                    <div>
                        <form class="form ml-2" action="/answer/{{$user->id}}" method="POST">
                        @csrf
                                
                            @foreach($output as $questions)
                            <h4 class="text-white text-uppercase mb-4 mt-2"id="question"> {{$questions->question}}</h4>
                            <input type="hidden" value=" {{$questions->id}}"  name="{{$questions->name}}"/>
                                <ul class="">
                                <li>
                                        <div class="inputGroup">
                                            <input id="radio1" value="{{$questions->value1}}" name="{{$questions->select}}" type="radio"/>
                                            <label for="radio1">{{$questions->option1}}</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="inputGroup">
                                            <input id="radio2" value="{{$questions->value2}}" name="{{$questions->select}}" type="radio"/>
                                            <label for="radio2">{{$questions->option2}}</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="inputGroup">
                                            <input id="radio3" value="{{$questions->value3}}" name="{{$questions->select}}" type="radio"/>
                                            <label for="radio3">{{$questions->option3}}</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="inputGroup">
                                            <input id="radio4" value="{{$questions->value4}}" name="{{$questions->select}}" type="radio"/>
                                            <label for="radio4">{{$questions->option4}}</label>
                                        </div>
                                    </li>
                                </ul>
                                @endforeach
                                <input type="submit" name="submit" value="Submit Answer" id="submit-btn"/>
                                
                            </form>
                        </div>
         
         
          <!-- end of col-9   -->
      </div>
      
      <!-- end of row -->
     
    </div>
    </section>

    <section>
       <!-- footer -->
      
    </section>
</body>
</html>  


