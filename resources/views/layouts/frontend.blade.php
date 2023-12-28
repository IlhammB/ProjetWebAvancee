<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="ILKA shop" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>ILKA Shop</title>
        <link
            href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}" type="text/css" />
        <link
            rel="stylesheet"
            href="frontend/css/font-awesome.min.css"
            type="text/css"
        />
        <link rel="stylesheet" href="{{asset('frontend/css/elegant-icons.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('frontend/css/nice-select.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.min.css')}}" type="text/css" />
        <link
            rel="stylesheet"
            href="{{asset('frontend/css/owl.carousel.min.css')}}"
            type="text/css"
        />
         <link rel="stylesheet" href="{{asset('frontend/css/slicknav.min.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" type="text/css" />
    </head>

    <body>
        <div id="preloder">
            <div class="loader"></div>
        </div>
        <div class="humberger__menu__overlay"></div>
        <div class="humberger__menu__wrapper">
            <div class="humberger__menu__logo">
                <a href="#"><img src="{{asset('frontend/img/logo.png')}}" alt="" /></a>
            </div>
            
            <div class="humberger__menu__widget">
               @guest 
               <div class="header__top__right__language">
                    <div class="header__top__right__auth">
                        <a href="{{ route('login')}}"><i class="fa fa-user"></i> Login</a>
                    </div>
                </div>
                <div class="header__top__right__auth" style="margin-left: 20px">
                    <a href="{{ route('register')}}"><i class="fa fa-user"></i> Register</a>
                </div>
               @else

               <div class="header__top__right__language">
                    <div class="header__top__right__auth">
                        <a href=""><i class="fa fa-user"></i>{{auth() ->user()->name}}</a>
                    </div>
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <li><a href="#">profile</a></li>
                        
                    </ul>
                </div>
                <div class="header__top__right__auth" style="margin-left: 20px">
                    <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-user"></i> Logout</a>
                    <form action= "{{ route('logout') }}" id="logout-form" method="post">
                        @csrf
                    </form>
                </div>
                
               @endguest
            </div>
            <nav class="humberger__menu__nav mobile-menu">
                <ul>
                    
                    <li><a href="./shop-grid.html">Shop</a></li>
                    <li>
                        <a href="#">Categories</a>
                        <ul class="header__menu__dropdown">
                        @foreach($menu_categories as $menu_category)
                                        <li><a href= "{{route('shop.index',$menu_category ->slug)}}">{{ $menu_category ->name }}</a></li>
                        @endforeach
                        </ul>
                    </li>
                   
                    
            </div>
        </div>
        <header class="header">
            <div class="header__top">
                <div class="container">
                        @guest
    
                            <div class="header__top__right">
                                <div
                                    class="header__top__right__language header__top__right__auth"
                                >
                                    <a class="d-inline" href="{{route('login')}}">
                                        <i class="fa fa-user"></i> Login</a
                                    >
                                   
                                </div>
                                <div class="header__top__right__auth">
                                    <a href="{{ route('login')}}"
                                        ><i class="fa fa-user"></i> Register</a
                                    >
                                </div>
                            </div> 
                        @else

                             <div class="header__top__right">
                                <div
                                    class="header__top__right__language header__top__right__auth"
                                >
                                    <a class="d-inline" href="#"
                                        ><i class="fa fa-user"></i> {{ auth() -> user()-> name}}</a
                                    >
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="#">Profile </a></li>
                                    </ul>
                                </div>
                                <div class="header__top__right__auth">
                                    <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                                    <i class="fa fa-user"></i> Logout</a>
                                    <form action= "{{ route('logout')}}" id="logout-form" method="post">
                                    </form>
                                </div>
                            </div> 

                        @endguest

                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="header__logo">
                            <a href="./index.html"
                                ><img src="frontend/img/logome.png" alt=""
                            /></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <nav class="header__menu">
                            <ul>
                                <li class="active">
                                    <a href="{{ route('home') }}"> Home</a>
                                </li>
                                <li><a href="{{ route('shop.index') }}">Shop</a></li>
                                <li>
                                    <a href="#">Categories</a>
                                    <ul class="header__menu__dropdown">
                                    @foreach($menu_categories as $menu_category)
                                        <li><a href= "{{route('shop.index',$menu_category ->slug)}}">{{ $menu_category ->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li> 
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                       
                    </div>
                </div>
                <div class="humberger__open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </header>

        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero__search">
                            <div class="hero__search__form">
                                <form action="{{ route('search') }}" method="GET">
                                    <input
                                        type="text"
                                        name="query" 
                                        placeholder="we have more for you"
                                    />
                                    <button type="submit" class="oval-button ">
                                        SEARCH
                                    </button>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
@yield('content')

<footer class="footer spad">
                    
                    <div class="col-lg-4 col-md-12">
                        <div class="footer__widget">
                                 
                            
                            <div class="footer__widget__social">
                                <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
                                <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>                       
        </footer>

        <script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('frontend/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('frontend/js/jquery.slicknav.js')}}"></script>
        <script src="{{asset('frontend/js/mixitup.min.js')}}"></script>
        <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('frontend/js/main.js')}}"></script>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
