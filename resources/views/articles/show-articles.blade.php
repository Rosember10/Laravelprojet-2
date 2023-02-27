@extends('layouts.app')
@section('title','Dashboard')
@section('content')









<div class="container mt-5 mb-5">
    <div class="row ">

        <div class=" row justify-content-center align-items-center ">
            <div class="col-8">
                <h4 class="text-primary tex-center text-uppercase">
                    @lang('lang.nav_mesArticles')
                </h4>
            </div>
            <div class="col-4">
            <a href="{{route('article.create')}}" type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
        <br>
        <br>
        <hr>
        @foreach ($articles as $article)
        <div class="col-12 col-md-6 p-4">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home-{{$loop->index}}" type="button" role="tab" aria-controls="pills-home" aria-selected="true">article en</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile-{{$loop->index}}" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">article fr</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home-{{$loop->index}}" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                    <div class="row ">
                        <div class="card ">
                            <div class="card-header bg-primary text-light  ">
                                {{$article->title}} 
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p> {{$article->content}}</p>
                                    <footer class="blockquote-footer">
                                        {{$article->articleHasUser->name}}
                                        <cite title="Source Title"> {{$article->date}}</cite>
                                    </footer>
                                    <div class="container">
                                        <a href="{{route('unArticle.show',$article->id)}}" class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile-{{$loop->index}}" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    <div class="row ">

                        <div class="card">
                            <div class="card-header bg-primary text-light  ">
                                {{$article->title_fr}}
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p>{{$article->content_fr}} </p>
                                    <footer class="blockquote-footer">
                                        {{$article->articleHasUser->name}}
                                        <cite title="Source Title">{{$article->date}} </cite>
                                    </footer>
                                    <div class="container">
                                        <a href="{{route('unArticle.show',$article->id)}}" class="btn btn-outline-primary "><i class="fa-solid fa-eye"></i></a>
                                    </div>
                                </blockquote>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>







@endsection