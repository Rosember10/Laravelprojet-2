@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row ">

        <div class=" row justify-content-center align-items-center ">
            <div class="col-8">
                <h4 class="text-primary tex-center text-uppercase">
                    @lang('lang.mes_repertoire')
                </h4>
            </div>
            <div class="col-4">
                <a href="{{route('repertoires.create')}}" class="btn btn-primary"> <i class="fa-solid fa-plus"></i> </a>
            </div>
        </div>
        <br>
        <br>
        <hr>
        <table class="table table-striped table-hover  table-borderless">
            <thead>
                <tr class="text-primary">
                    <th> <strong>@lang('lang.nom_repertoires')</strong> </th>
                    <th> <strong>Date</strong> </th>
                    <th> <strong>@lang('lang.partage_repertoire')</strong> </th>

                    <th> <strong></strong> </th>
                    <th> <strong></strong> </th>
                    <th> <strong></strong> </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($repertoires as $repertoire)
                <tr>
                    <td>{{$repertoire->title}}</td>
                    <td>{{$repertoire->date}}</td>
                    <td>{{$repertoire->repertoireHasUser->name}}</td>
                    <td><a href="{{route('repertoire.download',$repertoire->repertoire_url)}}" class="btn btn-success "><i class="fa-sharp fa-solid fa-download"></i></a></td>
                    <td><a href="{{route('repertoire.edit',$repertoire->id)}}" class="btn btn-success "><i class="fa-regular fa-pen-to-square"></i></a></td>
                    <td> <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#effacerModal">
                            <i class="fa-solid fa-trash"></i>
                        </button></td>
                </tr>
                <!-- Modal -->
                <div class=" modal fade" id="effacerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.effacer_repertoire')</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @lang('lang.message_effacer')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{route('repertoire.delete',[$repertoire->repertoire_url,$repertoire->id])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-danger" value="@lang('lang.button_effacer')">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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