<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        return view('shop.cart');
    }

    public function store(Request $request)
    {
        $Exist = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if (count($Exist) > 0) {

            Session::flash('success_message', 'آیتم مورد نظر قبلا به سبد خرید شما اضافه شده');
            return redirect('/cart');
        }

        $cartItem = Cart::add($request->id, $request->name, 1, $request->price);
        Cart::associate($cartItem->rowId, Product::class);
        Session::flash('success_message', 'آیتم مورد نظر به سبد خرید اضافه شد');
        return redirect('/cart');
    }

    public function destroy()
    {
        Cart::destroy();
        return redirect()->back();
    }

    public function remove($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        //in this method id is the rowId of the product in the cart package
        Cart::update($id, $request->quantity);
        return response()->json(['success' => true]);
    }

}
