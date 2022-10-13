@extends('shop')
@section('content')
<main role="main">
    <section class="py-5 cart_section">
        <div class="container">
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
                                <input style="display: inline-block" id="qte" name="quantity" class="form-control col-sm-4" type="number" value="{{ $item->quantity }}">
                                <input type="hidden" value="{{ $item->quantity }}" name="quantity">
                                <br>
                                <button class="pl-2 border-0 bg-transparent" href=""><i class="fas fa-sync"></i></button>
                            </form>
                           
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <button class="pl-2 text-danger border-0 bg-transparent"><i class="fas fa-trash"></i></button>
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
        </div>
    </section>
</main>
@endsection