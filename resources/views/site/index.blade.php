@extends('layouts.app')
@section('title','etudient-list')
    @section('content')

    @php $locale = session()->get('locale'); @endphp
  <nav class="navbar navbar-expand-lg  bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="{{asset('assets/logo.png')}}"  class="img-fluid" width="200" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-lg-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">Hello @if(Auth::check()) {{Auth::user()->name}} @else guest @endif</a>
        </li>
        @guest
        <li class="nav-item">
        <a class="nav-link" href="{{route('user.create')}}">Registration</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
        @else
        <li class="nav-item">
        <a class="nav-link" href="{{route('etudient.index')}}">etudient</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}">Logout</a>
        </li>
        @endguest
        <li class="nav-item">
        <a class="nav-link @if($locale=='en') bg-secondary @endif" href="">En <i class="flag flag-united-states"></i></a>
        </li>
        <li class="nav-item">
        <a class="nav-link @if($locale=='fr') bg-secondary @endif" href="">Fr <i class="flag flag-france"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container p-5" >
        <div class="row">
            <div class="col-12 text-center pt-5">
                <div class="row">
                    <div class="col-8">
                        <h4 class="text-primary text-uppercase">
                           Étudiant des college de maisonneuve
                        </h4>
                    </div>
                    <div class="col-4">
                        <a href="{{route('etudient.create')}}" class="btn btn-primary"> Ajouter un étudiant</a>
                    </div>
                </div>
                <hr>
            </div>
                <table class="table table-striped table-hover  table-borderless">
                    <thead >
                        <tr class="text-primary">
                
                        <th>ADRESSE</th>
                        <th>TÉLÉPHONE</th>
                        <th>DATE DE NAISSANCE</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody >
                    @forelse ($etudients as $etudient)
                        <tr >
                    
                        <td>{{$etudient->adresse}}</td>
                        <td>{{$etudient->phone}}</td>
                    
                        <td>{{$etudient->date_naissance}}</td>
                        <td><a href="{{route('etudient.show',$etudient->id)}}" class="btn btn-outline-primary m-2 p-1 text-center mx-auto d-block">Voir l'étudiant</a></td>
                        </tr>
                        @empty   
                        <tr>
                        <td></td>
                        <td>Aucun </td>
                        <td>étudiant</td>
                        <td>disponible</td>
                        <td></td>
                        </tr>
                    @endforelse    
                    </tbody>
                </table>
            </div>
         </div>
    <div class="d-flex">
        <div id="mi-div" class="mx-auto">
        {{$etudients}}
        </div>
    </div>

    @endsection