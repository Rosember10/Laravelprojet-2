@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

<header class="header-index">
      <img class="img-index" src="{{asset('assets/m3.png')}}" alt="Nicolas">
      <div>
            <h1 class="mt-5 header-index-h1">
                  APPRENDRE C'EST L'AVENIR
            </h1>
            <a href="{{ route('article.index')}}" class="btn btn-primary mt-5"> @lang('lang.dash_voirForum')</a>
      </div>
</header>

@endsection