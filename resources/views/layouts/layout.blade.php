<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="Fortozrcadlo, Fotka, Fotograf, Printerka, Svatba, Maturitní ples, Rodinné focení"/>
        <meta name="description" content="Profesionálnímu fotografování se věnujeme již 9 let. Je to pro nás nejen práce, ale hlavně velká vášeň. Díky našemu nadšení se snažíme vám přinášet stále nové styly focení a neotřelé formy fotokoutků. Každá akce je pro nás důležitá a proto se na ni pečlivě připravujeme -  vyrábíme si sami rekvizity i cedulky s hláškami. Také můžeme nabídnout profesionální fotografy na svatbu, firemní večírek, maturitní ples, festival či konferenci – všude tam, kde je třeba pohotový a hlavně pohodový fotograf. Nabízíme i rodinné focení, focení miminek i dětí, a focení pod vodou.
        Máme k dispozici různé fotokoutky – naší superstar je Fotozrcadlo, dále máme Jukebox, živý ateliér a jiné fotokoutky. Pro marketingové účely vám vyrobíme fotokoutek na míru.
        Fotokoutek je dnes už nedílnou součástí každé skvělé party ale naše Fotozrcadlo to prostě musíte zažít!"/>
        <meta name="author" content="HlavoDesign"/>
        <meta property="og:title" content="@yield('title','Fotozrcadlo')" />
        <meta property="og:description" content="Profesionálnímu fotografování se věnujeme již 9 let. Je to pro nás nejen práce, ale hlavně velká vášeň. Díky našemu nadšení se snažíme vám přinášet stále nové styly focení a neotřelé formy fotokoutků. Každá akce je pro nás důležitá a proto se na ni pečlivě připravujeme -  vyrábíme si sami rekvizity i cedulky s hláškami. Také můžeme nabídnout profesionální fotografy na svatbu, firemní večírek, maturitní ples, festival či konferenci – všude tam, kde je třeba pohotový a hlavně pohodový fotograf. Nabízíme i rodinné focení, focení miminek i dětí, a focení pod vodou.
        Máme k dispozici různé fotokoutky – naší superstar je Fotozrcadlo, dále máme Jukebox, živý ateliér a jiné fotokoutky. Pro marketingové účely vám vyrobíme fotokoutek na míru.
        Fotokoutek je dnes už nedílnou součástí každé skvělé party ale naše Fotozrcadlo to prostě musíte zažít!" />
        <meta property="og:url" content="{{URL::current()}}" />
        <meta property="og:site_name" content="Fotozrcadlo" />
        <meta property="og:image" content="{{asset('img/pages/fotozrcadlo-logo.jpg')}}" />
        <meta property="og:image:width" content="487" />
        <meta property="og:image:height" content="103" />
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-98692866-1', 'auto');
            ga('send', 'pageview');

        </script>
        <title>@yield('title','Fotozrcadlo')</title>

        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css?family=Asar&amp;subset=latin-ext" rel="stylesheet">
        @yield('script')

    </head>
    <body>
        <head>
            <ul class="lang list-inline">
                @foreach(Config::get('languages') as $key=>$lang)
                    <li>
                        <a href="{{ url('/lang',$key) }}"><img src="{{asset('img/pages/'.$key.'.png')}}" alt="{{$key}}"></a>
                    </li>
                @endforeach
            </ul>
            <div class="text-center logo">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="{{url('/')}}"><img src="{{asset('img/pages/fotozrcadlo-logo.jpg')}}" alt="logo" class="img-responsive logo__img"></a>
                            <h1 class="logo__text">FOTO ZRCADLO</h1>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>

                    <div class="collapse navbar-collapse" id="main-menu">

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right menu">
                            <li class="menu__item {{ Route::current()->getName()==='about' ? 'active' : null }}">
                                <a href="{{route('about')}}">{{trans('global.about')}}</a>
                            </li>
                            <li class="menu__item {{ Route::current()->getName()==='services' ? 'active' : null }}">
                                <a href="{{route('services')}}">{{trans('global.services')}}</a>
                            </li>
                            <li class="menu__item {{ Route::current()->getName()==='gallery' ? 'active' : null }}">
                                <a href="{{route('gallery')}}">{{trans('global.gallery')}}</a>
                            </li>
                            <li class="menu__item {{ Route::current()->getName()==='contact' ? 'active' : null }}">
                                <a href="{{route('contact')}}">{{trans('global.contact')}}</a>
                            </li>
                            <li class="menu__item {{ Route::current()->getName()==='references' ? 'active' : null }}">
                                <a href="{{route('references')}}">{{trans('global.reference')}}</a>
                            </li>
                            <li class="menu__item {{ Route::current()->getName()==='partners' ? 'active' : null }}">
                                <a href="{{route('partners')}}">{{trans('global.partner')}}</a>
                            </li>
                            {{--<li class="menu__item {{ Route::current()->getName()==='shop' ? 'active' : null }}">--}}
                                {{--<a href="{{route('shop')}}">{{trans('global.buy')}}</a>--}}
                            {{--</li>--}}
                        </ul>

                    </div>
                </div>
            </nav>


        </head>
        <main class="main__content">
            @include('flash::message')
            @yield('content')
        </main>
        <footer class="footer">
            <div class="jumbotron">
                <h3 class="text-center">
                    {{trans('global.kontakt')}}
                </h3>
                <div class="container text-center center-block">
                    <a target="_blank" href="https://www.facebook.com/fotozrcadlo/?fref=ts"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
                    <a target="_blank" href="https://www.instagram.com/fotozrcadlo/"><i id="social-in" class="fa fa-instagram fa-3x social"></i></a>
                    <a target="_blank" href="http://firemnivecirek.com/fotozrcadlo/"><img class="logo__fv" src="{{asset('img/pages/logo_text_fv.png')}}" alt="firemní večírek"></a>
                    {{--<a target="_blank" href="mailto:stepankarys@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>--}}
                    <div class="row">
                        <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2">
                            <hr>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 text-left">
                                    <div class="thumbnail">
                                        <div class="caption">
                                            <div>
                                                <i class="fa fa-address-card fa-2x" aria-hidden="true"></i>
                                            </div>
                                            Juraj Šefčík <br>
                                            ředitel společnosti<br>
                                            <i class="fa fa-mobile fa-lg" aria-hidden="true"></i>Tel. 725 027 014<br>
                                            <i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i><a href="mailto:juraj.sef@gmail.com">juraj.sef@gmail.com</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 text-left">
                                    <div class="thumbnail">
                                        <div class="caption">
                                            <div>
                                                <i class="fa fa-address-card fa-2x" aria-hidden="true"></i>
                                            </div>
                                            Štěpánka Rysová<br>
                                            kreativní ředitelka<br>
                                            <i class="fa fa-mobile fa-lg" aria-hidden="true"></i>Tel. 606 766 437<br>
                                            <i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i><a href="mailto:stepankarys@gmail.com">stepankarys@gmail.com</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-xs-offset-0 col-sm-offset-3">
                                    <div class="thumbnail">
                                        <div class="caption">
                                            <div>
                                                <i class="fa fa-money fa-lg fa-2x" aria-hidden="true"></i>
                                            </div>
                                            <strong>Fakturační údaje</strong><br>
                                            Juraj Šefčík <br>
                                            ičo 88675149<br>
                                            Olomouc - Neředín, gen. Píky, PSČ 779 00
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer__wrapper">
                <div class="container">
                    <ul class="nav navbar-nav menu--footer">
                        <li class="menu__item {{ Route::current()->getName()==='about' ? 'active' : null }}">
                            <a href="{{route('about')}}">{{trans('global.about')}}</a>
                        </li>
                        <li class="menu__item {{ Route::current()->getName()==='services' ? 'active' : null }}">
                            <a href="{{route('services')}}">{{trans('global.services')}}</a>
                        </li>
                        <li class="menu__item {{ Route::current()->getName()==='gallery' ? 'active' : null }}">
                            <a href="{{route('gallery')}}">{{trans('global.gallery')}}</a>
                        </li>
                        <li class="menu__item {{ Route::current()->getName()==='contact' ? 'active' : null }}">
                            <a href="{{route('contact')}}">{{trans('global.contact')}}</a>
                        </li>
                        <li class="menu__item {{ Route::current()->getName()==='references' ? 'active' : null }}">
                            <a href="{{route('references')}}">{{trans('global.reference')}}</a>
                        </li>
                        <li class="menu__item {{ Route::current()->getName()==="partners" ? 'active' : null }}">
                            <a href="{{route('partners')}}">{{trans('global.partner')}}</a>
                        </li>
                        {{--<li class="menu__item {{ Route::current()->getName()==='shop' ? 'active' : null }}">--}}
                        {{--<a href="{{route('shop')}}">{{trans('global.buy')}}</a>--}}
                        {{--</li>--}}
                    </ul>
                </div>
                <div class="text-center">Handcrafted with <span class="red">♥</span> by <a href="http://hlavodesign.eu/" target="_blank">hlavoDesign</a></div>
                <div class="text-center">
                    <a href="http://www.toplist.cz/" target="_top"><img src="http://toplist.cz/count.asp?id=1775715" alt="TOPlist" border="0"></a>
                </div>
            </div>
        </footer>
    </body>
</html>
