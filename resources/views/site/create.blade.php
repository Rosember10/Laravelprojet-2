@extends('layouts.app')
@section('title',('ajouter-etudient'))
    @section('content')
<div class="container mt-3">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route ('etudient.index')}}">Accueil</a></li>
      <li class="breadcrumb-item active" aria-current="page">Étudiant Création</li>
    </ol>
  </nav>
</div>
<section class="h-100 " >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card  " style="background-color: #0079C2;">
          <img src="{{asset('assets/create.jpg')}}"class=" w-100 h-25" alt="maisonneuve">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2 text-white">Ajouter un nouvel étudiant</h3>
            <form class="px-md-2" method="post">
                @csrf
              <div class="mb-3 form-floating ">
                <input type="text" id="name" name="nom" class="form-control" >
                <label  for="nom">Nom et Prénom</label>
              </div>
              <div class="mb-3 form-floating">
                <input type="text" id="adresse" name="adresse" class="form-control" >
                <label class="form-label" for="adresse">Adresse</label>
              </div>
              <div class="mb-3 form-floating">
                <input type="text" id="phone" name="phone" class="form-control" >
                <label class="form-label" for="phone">Numéro de téléphone</label>
              </div>
              <div class="mb-3 form-floating">
                <input type="text" id="email" name="email" class="form-control" >
                <label class="form-label" for="email">Adresse Courriel</label>
              </div>
              <div class="mb-3 form-floating">
                <input type="date" id="date_naissance" name="date_naissance" class="form-control" >
                <label class="form-label" for="date_naissance">Data de Naissance</label>
              </div>
              <div class="col-md-6 mb-4 ">
                <label  class="form-label text-white">Select pays</label>
                <select name="ville_id" class="select form-control">
                @foreach($villes as $ville)
                    <option value="{{$ville->id}}" >{{$ville->nom}}</option>
                @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-success btn-lg mb-1">Sauvagarder</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection