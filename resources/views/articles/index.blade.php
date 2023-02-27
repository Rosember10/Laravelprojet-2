@extends('layouts.app')
@section('title',('ajouter-article'))
@section('content')

<div class="container p-5">
    <div class="row">
        <div class="container text-center ">
            <h1 class="header-forum">Forum Collège de Maisonneuve</h1>
        </div>
        @guest
        @else
        <div class="container d-flex flex-row-reverse ">
            <a href="{{route('article.create')}}" type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
        </div>
        @endguest
        <div class="container  mb-5">
            <div class="row">
                <div class="container mt-5">
                    <h4 class="text-secondary">  @lang('lang.lesArticles')</h4>
                </div>
                <hr>
                @forelse ($articles as $article)
                <div class=" col-12 col-md-6 col-lg-6">
                    <div class="card mt-3">
                        <div class="card-header bg-primary text-light  ">
                            {{$article->title}}
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p> {{$article->content}}</p>
                                <footer class="blockquote-footer"> {{$article->articleHasUser->name}}<cite title="Source Title"> {{$article->date}}</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
                @empty
                <div class=" col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>Aucun article du forum disponible</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>



@endsection