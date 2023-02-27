@extends('layouts.app')
@section('title','Répertoire create ')
@section('content')


<div class="row justify-content-center mt-5">
    <div class="col-6">
        <div class="card">
            <form method="post" >
                @csrf
                @method('put')
                <div class="card-header bg-primary text-uppercase fs-3 text-light text-center">
                    <strong> @lang('lang.modifier_repertoire')</strong>
                </div>
                <div class="card-body">
                    <div class="control-group col-12 mt-2">
                        <label for="title" class="text-secondary">@lang('lang.nom_repertoire_fr')</label>
                        <input type="text" id="title" name="title_fr" class="form-control" value="{{$repertoire->title_fr}}">
                        @if($errors->has('title_fr'))
                        <div class="text-danger mt-2">
                            {{$errors->first('title_fr')}}
                        </div>
                        @endif
                    </div>
                    <div class="control-group col-12 mt-2">
                        <label for="title" class="  text-secondary">@lang('lang.nom_repertoire_en')</label>
                        <input type="text" id="title" name="title" class="form-control " value="{{$repertoire->title}}">
                        @if($errors->has('title'))
                        <div class="text-danger mt-2">
                            {{$errors->first('title')}}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="@lang('lang.auth_sauvagarder')" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>





@endsection