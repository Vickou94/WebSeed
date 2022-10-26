<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLine;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::where('email', auth()->user()->email)->orderby('created_at', 'desc')->paginate(3);
        $ordersForLine = Order::where('email', auth()->user()->email)->get('document_number')->toArray();
        $orderlines = OrderLine::whereIn('document_number', $ordersForLine)->get();
        return view('order.order', compact('orders','orderlines'));
    }
}
