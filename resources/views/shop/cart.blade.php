@extends('shop')
@section('content')
<main role="main">
    <section class="py-5 cart_section">
        <div class="container">
            @if(Cart::isEmpty())
            <div class="col-sm-12 empty-cart-cls text-center">
                <img src="{{asset('img/empty.png')}}" class="img-fluid mb-4 mr-3">
                <h3><strong>Votre panier est vide</strong></h3>
                <h4>Commencez vos achats ci-dessous :)</h4>
                <a href="{{route('homepage')}}" class="btn btn-success cart-btn-transform m-3" data-abc="true">Retour à l'accueil</a>
            </div>
            @else
            <h1 class="jumbotron-heading"> <span class="badge badge-success">Votre panier </span></h1>
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button class="badge badge-danger border-0 mb-2 py-2">Vider le panier</button>
            </form>
            <table class="table table-bordered table-responsive-sm">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>P.U</th>
                        <th>Total TTC</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                    <tr>
                        <td>
                            <img width="110" class="rounded-circle img-thumbnail" src="{{ asset('img/products/'.$item->attributes->image) }}" alt="Produit">
                            {{ $item->name }}
                        </td>
                        <td class="w-25">
                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                <input style="display: inline-block" name="quantity" class="form-control col-sm-4" type="number" value="{{ $item->quantity }}">
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <p><button class="pl-2 border-0 bg-transparent pt-2" href=""><i class="fas fa-sync mx-1"></i>Valider quantité</button></p>
                            </form>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <p><button class="pl-2 text-danger border-0 bg-transparent"><i class="fas fa-trash mx-1"></i>Supprimer l'article</button></p>
                            </form>
                        </td>
                        <td>
                            {{ $item->attributes->price_ttc }}€
                        </td>
                        <td>
                            {{ number_format($item->attributes->price_ttc*$item->quantity,2) }}€
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td>Total HT</td>
                        <td>{{ number_format($cartHtTotal,2) }}€</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td>TVA (20%)</td>
                        <td>{{ number_format($tva,2) }}€</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td>Total TTC</td>
                        <td>{{ number_format($cartTotal,2) }}€</td>
                    </tr>
                </tfoot>
            </table>
            <form action="{{ route('payement') }}" method="POST">
                @csrf
                <button class="btn btn-block btn-outline-dark" type="submit">Commander</button>
            </form>
            @endif
        </div>
    </section>
</main>
@endsection