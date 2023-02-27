@extends('layouts.app')
@section('title','Répertoire-list')
@section('content')

<div class="container p-5">
    <div class="row">
        <div class="container text-center mt-3 ">
            <h1 class="header-forum">@lang('lang.titre_repertoires')</h1>
        </div>
        @guest
        @else
        <div class="container d-flex flex-row-reverse">
            <a href="{{route('repertoires.create')}}" type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
        </div>
        @endguest
        <div class="container mt-5">
            <h4 class="text-secondary"> @lang('lang.dernier_repertoires') </h4>
        </div>
        <hr>
        <table class="table table-striped table-hover  table-borderless  ">
            <thead>
                <tr class="text-primary">
                    <th> <strong>@lang('lang.nom_repertoires')</strong> </th>
                    <th> <strong>Date</strong> </th>
                    <th> <strong>@lang('lang.partage_repertoire')</strong> </th>

                    <th> <strong></strong> </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($repertoires as $repertoire)
                <tr>
                    <td>{{$repertoire->title}}</td>
                    <td>{{$repertoire->date}}</td>
                    <td>{{$repertoire->repertoireHasUser->name}}</td>
                    @guest
                    <td></td>
                    @else
                    <td><a href="{{route('repertoire.download',$repertoire->repertoire_url)}}" class="btn btn-success "><i class="fa-sharp fa-solid fa-download"></i></a></td>
                    @endguest
                </tr>
                @empty
                <tr>
                    <td>@lang('lang.aucun_repertoire') </td>
                    <td>@lang('lang.repertoire_repertoire') </td>
                    <td>@lang('lang.disponible_repertoire') </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="d-flex">
    <div id="mi-div" class="mx-auto">
        {{$repertoires}}
    </div>
</div>
@endsection