@extends('layouts.app')
@section('title',('ajouter-article'))
@section('content')



<div class="container">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">article fr</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">article en</button>
        </li>
    </ul>
    <form method="post">
        @csrf
        <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <div class="card mt-3">
                                <div class="card-header bg-primary text-light  ">
                                    {{$unArticle->title_fr}}
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p>{{$unArticle->content_fr}}</p>
                                        <footer class="blockquote-footer"> {{$unArticle->articleHasUser->name}}<cite title="Source Title"> {{$unArticle->date}}</cite></footer>
                                        <div class="container">
                                            <a href="{{route('unArticle.edit',$unArticle->id)}}" class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></a>
                                            <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#effacerModal">
                                            <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="card mt-3">
                            <div class="card-header bg-primary text-light  ">
                                {{$unArticle->title}}
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p>{{$unArticle->content}}</p>
                                    <footer class="blockquote-footer"> {{$unArticle->articleHasUser->name}}<cite title="Source Title"> {{$unArticle->date}}</cite></footer>
                                    <div class="container">
                                        <a href="{{route('unArticle.edit',$unArticle->id)}}" class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#effacerModal">
                                        <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

</div>

</form>

</div>


<!-- Modal -->
<div class=" modal fade" id="effacerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.effacer_edutiant')</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               @lang('lang.message_effacer')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{route('unArticle.show', $unArticle->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="@lang('lang.button_effacer')">
                </form>
            </div>
        </div>
    </div>
</div>



@endsection