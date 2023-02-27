@extends('layouts.app')
@section('title',('ajouter-etudient'))
@section('content')




<section class="h-100 " style="background: rgb(246,246,246);background: linear-gradient(90deg, rgba(246,246,246,1) 0%, rgba(215,215,227,1) 49%, rgba(255,255,255,1) 100%);">
  <div class="container  py-5 h-100" >
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card" >
          <img src="{{asset('assets/create.jpg')}}" class=" w-100 h-25" alt="maisonneuve">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2 text-primary ">@lang('lang.auth_creer') </h3>
            <form class="px-md-2" method="post">
              @csrf
              <div class="mb-3 form-floating ">
                <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                <label for="nom"> @lang('lang.auth_nom')</label>
                @if($errors->has('name'))
                <div class="text-danger mt-2 ">
                  {{$errors->first('name')}}
                </div>
                @endif
              </div>
              <div class="mb-3 form-floating">
                <input type="text" id="email" name="email" class="form-control" value="{{old('email')}}">
                <label class="form-label" for="email">@lang('lang.auth_courriel')</label>
                @if($errors->has('email'))
                <div class="text-danger mt-2">
                  {{$errors->first('email')}}
                </div>
                @endif
              </div>
              <div class="mb-3 form-floating">
                <input type="password" id="password" name="password" class="form-control">
                <label class="form-label" for="password">@lang('lang.auth_motpass') </label>
                @if($errors->has('password'))
                <div class="text-danger mt-2">
                  {{$errors->first('password')}}
                </div>
                @endif
              </div>
              <div class="mb-3 form-floating">
                <input type="text" id="adresse" name="adresse" class="form-control" value="{{old('adresse')}}">
                <label class="form-label" for="adresse">@lang('lang.auth_adresse')</label>
                @if($errors->has('adresse'))
                <div class="text-danger mt-2">
                  {{$errors->first('adresse')}}
                </div>
                @endif
              </div>
              <div class="mb-3 form-floating">
                <input type="text" id="phone" name="phone" class="form-control" value="{{old('phone')}}">
                <label class="form-label" for="phone">@lang('lang.auth_telephone')</label>
                @if($errors->has('phone'))
                <div class="text-danger mt-2">
                  {{$errors->first('phone')}}
                </div>
                @endif
              </div>
              <div class="mb-3 form-floating">
                <input type="date" id="date_naissance" name="date_naissance" class="form-control">
                <label class="form-label" for="date_naissance">@lang('lang.auth_datenaisssance')</label>
                @if($errors->has('date_naissance'))
                <div class="text-danger mt-2">
                  {{$errors->first('date_naissance')}}
                </div>
                @endif
              </div>
              <div class="col-md-6 mb-4 ">
                <label class="form-label text-primary">@lang('lang.auth_pays')</label>
                <select name="ville_id" class="select form-control">
                  @foreach($villes as $ville)
                  <option value="{{$ville->id}}">{{$ville->nom}}</option>
                  @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-success btn-lg mb-1">@lang('lang.auth_sauvagarder')</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection