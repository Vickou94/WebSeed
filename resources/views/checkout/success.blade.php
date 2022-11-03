@extends('auth')
@section('content')
<div class="text-center pt-5">
  <h1 class="display-3">Merci pour votre achat !</h1>

  <img src="{{asset('img/thanks.jpg')}}" class="img-fluid mb-4 mr-3" alt="success">

  <p class="lead">
    <a class="btn btn-success btn-sm mt-5" href="{{Route('homepage')}}" role="button">Retour à l'accueil</a>
  </p>
</div>
@endsection