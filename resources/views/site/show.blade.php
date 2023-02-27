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
      <li class="breadcrumb-item active" aria-current="page">Étudiant</li>
    </ol>
  </nav>
</div>


<div class=" container mt-5  mb-5" >
  <div class="row g-5 align-items-center justify-content-center ">
        <div class="col-12 col-lg-4">
            <div class="card" >
                <img src="{{asset('assets/user.png')}} " class="card-img-top" alt="defaul_user">
                <div class="card-body mx-auto d-block text-center">
                    <h5 class="card-title">Nom de l'étudiant </h5>
                    <p class="card-text text-center text-secondary ">{{$etudient->nom}}</p>
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
                      {{$etudient->adresse}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$etudient->email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$etudient->phone}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"> Date de naissance :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$etudient->date_naissance}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"> Ville</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$etudient->etudientHasVille->nom}}
                    </div>
                  </div>
                  <hr>
                  <div>
                    <div class="row ">
                        <div class="col-12 m-0 d-flex justify-content-center">
                            <a href="{{route('etudient.edit',$etudient->id)}}" class="btn btn-outline-success m-1">Mettre à jour</a>
                            <button type="button" class="btn btn-outline-danger m-1" data-bs-toggle="modal" data-bs-target="#effacerModal">
                              Effacer
                            </button>
                        </div>
                    </div>
                  </div>
               
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class=" modal fade" id="effacerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer Étudiant</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Êtes-vous sûr d'effacer l'étudiant actuel
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <form action="{{route('etudient.show', $etudient->id)}}"  method="post">     
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Effacer">
        </form>
      </div>
    </div>
  </div>
</div>




@endsection