@extends('shop')
@section('content')
<main role="main">
        <div class="container pt-5">
            <div class="row justify-content-between">
                <div class="col-6">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{asset('img/products/'.$product->picture)}}" alt="Card image cap">
                    </div>
                </div>
                <div class="col-6">
                    <h1 class="jumbotron-heading pb-5">{{$product->name}}</h1>
                    <h5>{{ $product->priceTtc() }}€</h5>
                    <p class="lead text-muted pb-5">{{$product->description}}</p>
                    @if(Auth::check())

                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price_ht }}" name="price">
                        <input type="hidden" value="{{ $product->picture }}"  name="image">
                        <input type="hidden" value="{{ $product->quantity }}" name="quantity">

                    <p>
                    <label for="qte">Quantité :</label>
                                <input type="number" min="1" name="quantity" autocomplete="off" value="1"
                                       class="form-control">
                    <button class="btn btn-cart my-2 btn-block"><i class="fas fa-shopping-cart"></i>
                                Ajouter au Panier</button>
                    </p>

                    </form>

                    @endif
                </div>
            </div>
        </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <h3>Vous aimerez aussi :</h3>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="{{asset('img/products/cactus.jpg')}}" class="card-img-top img-fluid" alt="Responsive image">
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <div class="btn-group">
                                    <a href="http://127.0.0.1:8000/produit/12" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="{{asset('img/products/crassula.jpg')}}" class="card-img-top img-fluid" alt="Responsive image">
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <div class="btn-group">
                                    <a href="http://127.0.0.1:8000/produit/13" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="{{asset('img/products/rhipsalis.jpg')}}" class="card-img-top img-fluid" alt="Responsive image">
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <div class="btn-group">
                                    <a href="http://127.0.0.1:8000/produit/17" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection