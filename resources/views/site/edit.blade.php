@extends('layouts.app')
@section('title' ,'etudient-nom')
    @section('content')

<div class="container ">
    <div class="row rounded mx-auto d-block ">
            <img src="{{asset('assets/banner.jpg')}}" class="img-fluid  " alt="">
    </div>
</div>
<div class="container mt-3">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route ('etudient.index')}}">Accueil</a></li>
      <li class="breadcrumb-item active" aria-current="page">Étudiant Modification</li>
    </ol>
  </nav>
</div>
<form method="post">
    @csrf
    @method('put')
    <div class=" container mt-5 mb-5 " >
        <div class="row g-5 align-items-center justify-content-center ">
            <div class="col-12 col-lg-4">
                <div class="card" >
                        <img src="{{asset('assets/user.png')}} " class="card-img-top" alt="defaul_user">
                        <div class="card-body mx-auto d-block text-center">
                            <h5 class="card-title"> Nom complete de l'étudiant  </h5>
                            <input type="text" id="nom" name="nom" class="form-control " value="{{$etudient->nom}}">
                        </div>
                </div>
            </div>
            <div class="col-12  col-lg-7">
                <div class="col-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                <h6 class="mb-0">Adresse:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <input type="text" id="adresse" name="adresse" class="form-control" value=" {{$etudient->adresse}}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                <h6 class="mb-0">Adresse Courriel</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <input type="text" id="email" name="email" class="form-control" value="{{$etudient->email}}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                <h6 class="mb-0">Numéro de téléphone:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <input type="text" id="phone" name="phone" class="form-control" value="{{$etudient->phone}}" >
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                <h6 class="mb-0"> Date de naissance :</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <input type="date" id="date_naissance" name="date_naissance" class="form-control" value="{{$etudient->date_naissance}}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                <h6 class="mb-0"> Ville</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select name="ville_id" class="select form-control">
                                        @foreach($villes as $ville)
                                        @if( $etudient->etudientHasVille->nom == $ville->nom )
                                        <option value="{{$ville->id}}" selected>{{$ville->nom}}</option>
                                        @else 
                                        <option value="{{$ville->id}}" >{{$ville->nom}}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-3 mx-auto d-block">
                                        <input type="submit" value="Sauvagarder" class="btn btn-outline-success m-1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



@endsection