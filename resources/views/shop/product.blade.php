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
                    <h5>{{number_format($product->price_ht,2)}}€</h5>
                    <p class="lead text-muted pb-5">{{$product->description}}</p>
                    <p>
                    <button class="btn btn-cart my-2 btn-block"><i class="fas fa-shopping-cart"></i>
                                Ajouter au Panier</button>
                    </p>
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
                                    <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
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
                                    <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
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
                                    <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
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