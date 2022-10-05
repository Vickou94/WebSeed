@extends('home')
@section('content')
<div class="album py-5 bg-light">
        <div class="container">
          
        @if(Auth::check())
            <div class="alert alert-success text-center" role="alert">
            Bienvenue {{ Auth::user()->name }}, tu peux désormais commencer à faire tes achats.
              </div>
        @endif

          <div class="row">
              @foreach($products as $product)
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{asset('img/products/'.$product->picture)}}" alt="Plantes">
                <div class="card-body">
                    <h4>{{$product->name}}</h4>
                  <p class="card-text">{{$product->description}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="{{route('see_product',[$product->id])}}" class="btn btn-sm btn-outline-secondary">Voir</a>
                      @if(Auth::check())
                      <a href="#" class="btn btn-sm btn-outline-secondary">Ajouter au panier</a>
                      @endif
                    </div>
                    <small class="text-muted">{{number_format($product->price_ht, 2)}}€</small>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
@endsection