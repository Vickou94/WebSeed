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
                      <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price_ht }}" name="price">
                        <input type="hidden" value="{{ $product->picture }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                      <button class="btn btn-sm btn-outline-secondary">Ajouter au panier</button>
                      </form>
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