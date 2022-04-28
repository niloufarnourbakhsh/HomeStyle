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
        $statuses=Status::all();
        $orders=Order::query()->with('user')->paginate('6');
        return view('orders.index')->with('orders',$orders)->with('statuses',$statuses);
    }
    public function show()
    {
        $orders=Order::query()->where(['user_id'=>Auth::id()])->get();
        return view('orders.show')->with('orders',$orders);
    }

    public function ordered()
    {
        $statuses=Status::all();
        $orders = Order::query()->with('status')->where(['status_id' => '1'])->orderBy('created_at', 'Desc')->get();
        return view('orders.ordered')->with('orders',$orders)->with('statuses',$statuses);
    }

    public function processed()
    {
        $statuses=Status::all();
        $orders = Order::query()->with('status')->where(['status_id' => '2'])->orderBy('created_at', 'Desc')->get();
        return view('orders.processed')->with('orders',$orders)->with('statuses',$statuses);
    }

    public function sent()
    {
        $statuses=Status::all();
        $orders = Order::query()->with('status')->where(['status_id' => '3'])->orderBy('created_at', 'Desc')->get();
        return view('orders.sent')->with('orders',$orders)->with('statuses',$statuses);
    }

    public function update(Request $request,Order $order)
    {
        $order->update(['status_id'=>$request->status]);
        return redirect()->back();
    }

    public function details(Order $order)
    {
        return view('orders.details')->with('order',$order);
    }
}
