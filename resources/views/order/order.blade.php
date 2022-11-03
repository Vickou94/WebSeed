@extends('orderlist')
@section('content')
<div class="container mt-5">
    @if(count($orders) < 1)
    <div class="col-sm-12 text-center">
                <img src="{{asset('img/order.png')}}" class="img-fluid mb-4" alt="no order">
                <h3><strong>Vous n'avez aucune commande</strong></h3>
                <h4>Commencez vos achats ci-dessous :)</h4>
                <a href="{{route('homepage')}}" class="btn btn-success cart-btn-transform m-3" data-abc="true">Retour à l'accueil</a>
            </div>
@else
<div class="d-flex justify-content-center row">
    <div class="col-md-10">
        <div class="rounded">
            <div class="table-responsive table-borderless">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Numero de commande</th>
                            <th>Nom</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Détails</th>
                        </tr>
                    </thead>
                    <tbody class="table-body">
                        @foreach($orders as $order)
                        <tr class="cell-1">
                            <td>{{ $order->document_number }}</td>
                            <td>{{ auth()->user()->name }}</td>
                            @if($order->statut == true)
                            <td><span class="badge badge-success">Livré</span></td>
                            @else
                            <td><span class="badge badge-warning">En cours</span></td>
                            @endif
                            <td>{{ number_format($order->total,2) }}€</td>
                            <td>{{ $order->created_at }}</td>
                            <td class="btn_view"><i class="fa fa-ellipsis-h text-black-50"></i></td>
                        </tr>

                        <tr class="details_view">
                            <td colspan="7">
                                <h3 class="text-center">Détails Commande</h3>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table user-list">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center"><span>Article</span></th>
                                                        <th class="text-center"><span>Quantité</span></th>
                                                        <th class="text-center"><span>Prix unitaire</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="py-4">
                                                    @foreach($orderlines as $orderline)
                                                    @if($orderline->document_number === $order->document_number)
                                                    <tr>
                                                        <td class="text-center">{{ $orderline->item_id }}</td>
                                                        <td class="text-center">{{ $orderline->quantity }}</td>
                                                        <td class="text-center">{{ number_format($orderline->price,2) }}€</td>
                                                    </tr>
                                                    @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif
<div class="row">
    <div class="col-12 d-flex justify-content-center py-4">
        {{ $orders->links('')}}
    </div>
</div>
</div>
@endsection