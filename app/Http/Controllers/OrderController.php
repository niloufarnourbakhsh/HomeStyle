<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query()->with('user')->paginate('6');
        return view('orders.index')->with('orders', $orders);
    }

    public function show()
    {
        $orders = Order::query()->where(['user_id' => Auth::id()])->get();
        return view('orders.show')->with('orders', $orders);
    }

    public function update(Request $request, Order $order)
    {
        $order->update(['status_id' => $request->status]);
        return redirect()->back();
    }

    public function status($status_id)
    {
        $orders = Order::query()
            ->with('status')
            ->where(['status_id' => $status_id])
            ->orderBy('created_at', 'Desc')
            ->paginate(6);
        return view('orders.status')->with('orders', $orders);
    }

    public function details(Order $order)
    {
        return view('orders.details')->with('order', $order);
    }
}
