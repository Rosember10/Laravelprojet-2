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
        @method('put')
        <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center mt-2">
                            <h1 class="display-one text-primary">Modifier Votre Article</h1>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <div class="card">

                                <div class="card-body">
                                    <div class="control-group col-12">
                                        <label for="title_fr" class="text-secondary">Titre du article</label>
                                        <input type="text" id="title_fr" name="title_fr" class="form-control" value="{{$unArticle->title_fr}}" >
                                        @if($errors->has('title_fr'))
                                            <div class="text-danger mt-2">
                                                {{$errors->first('title_fr')}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="control-group col-12">
                                        <label for="content_fr" class="text-secondary">Article</label>
                                        <textarea id="content_fr" name="content_fr" class="form-control" rows="5" cols="30" > {{$unArticle->content_fr}}</textarea>
                                        @if($errors->has('content_fr'))
                                            <div class="text-danger mt-2">
                                                {{$errors->first('content_fr')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" value="Sauvagarder" class="btn btn-success">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">

                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center mt-2">
                            <h1 class="display-one text-primary">Edit your Article</h1>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <div class="card">

                                <div class="card-body">
                                    <div class="control-group col-12">
                                        <label for="title" class="text-secondary">Title du article</label>
                                        <input type="text" id="titl" name="title" class="form-control" value="{{$unArticle->title}}">
                                    </div>
                                    <div class="control-group col-12">
                                        <label for="content" class="text-secondary">Article</label>
                                        <textarea id="content" name="content" class="form-control" rows="5" cols="30"> {{$unArticle->content}}</textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" value="Save" class="btn btn-success">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </form>

</div>



@endsection