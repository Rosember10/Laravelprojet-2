@extends('layouts.app')
@section('title',('ajouter-article'))
@section('content')



<div class="container">
    <div class="  justify-content-center align-items-center ">
        <div class="col-auto p-5">
            <div class="container text-center mt-3">
                <h1 class="header-forum">@lang('lang.dash_titre')</h1>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <strong> @lang('lang.dash_voirForum') </strong>
                            </div>

                        </div>
                        <div class="col-auto">
                            <a href="{{route('article.index')}}" class="btn btn-primary"> <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <strong> @lang('lang.dash_voirMesForum')</strong>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('articles.show')}}" class="btn btn-primary"> <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <strong> @lang('lang.dash_repertoires')</strong>
                            </div>
                        </div>
                        <div class="col-auto">
                        <a href="{{route('repertoires.index')}}" class="btn btn-primary"> <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <strong> @lang('lang.dash_voirMesRepertoire')</strong>
                            </div>
                        </div>
                        <div class="col-auto">
                    
                        <a href="{{route('repertoires.show')}}" class="btn btn-primary"> <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>





@endsection