@extends('auth')
@section('content')
<div class="text-center pt-5">
  <h1 class="display-3 pb-5">Oops, une erreur s'est produite lors du paiement...</h1>

  <img src="{{asset('img/oops.jpg')}}" class="img-fluid mb-4 mr-3" alt="erreur">

  <p class="lead">
    <a class="btn btn-success btn-sm mt-5" href="{{Route('homepage')}}" role="button">Retour à l'accueil</a>
  </p>
</div>
@endsection