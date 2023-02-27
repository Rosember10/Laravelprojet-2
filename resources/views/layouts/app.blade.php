<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{config('app.name')}} @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>

<body id="page-top" class=" d-flex flex-column min-vh-100" style="background-color: #F8FAFF;">


@php $locale = session()->get('locale'); @endphp
<nav class="navbar navbar-expand-lg  sticky-top " style="background-color:#FFFFFF;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{asset('assets/logo.png')}}" class="img-fluid" width="200" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-lg-end " id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-primary " aria-current="page" href="{{route('dashboard')}}"> <strong> @lang('lang.nav_bonjour') @if(Auth::check()) {{Auth::user()->name}} @else @lang('lang.nav_invite') @endif </strong> </a>
                </li>

                <li class="nav-item">
                <a class="nav-link" href="{{route('article.index')}}">Forum</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('repertoires.index')}}"> @lang('lang.nav_repertoires')</a>
                </li>

                @guest
                <li class="nav-item">
                    <a class="nav-link " href="{{route('user.create')}}"> @lang('lang.nav_enregistrement') </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">@lang('lang.nav_seconnecter')</a>
                </li>
                @else
                <li class="nav-item">
                <a class="nav-link" href="{{route('articles.show')}}">@lang('lang.nav_mesArticles')</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('repertoires.show')}}">@lang('lang.nav_mesRepertoires')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">@lang('lang.nav_deconnexion')</a>
                </li>
                @endguest
                <li class="nav-item">
                    <a class="nav-link @if($locale=='en') bg-secondary @endif" href="{{route('lang', 'en')}}">En <i class="flag flag-united-states"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($locale=='fr') bg-secondary @endif" href="{{route('lang', 'fr')}}">Fr <i class="flag flag-france"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    @yield('content')

    <footer class="bg-dark py-4 mt-auto footer">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white"> Collège de Maisonneuve &copy; @lang('lang.footer_droit') </div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">@lang('lang.footer_confidentialite')</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">@lang('lang.footer_conditions')</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">@lang('lang.footer_contactez')</a>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

</html>