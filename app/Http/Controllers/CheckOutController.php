<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    //checking the address
    public function showAddress()
    {
        $user=$this->getCheckOutInfo();
        $user->with('address');
        return view('shop.step-2')->with('user',$user);
    }

    public function checkAll()
    {
        $user=$this->getCheckOutInfo();
        $user->with('address');
        return view('shop.step-3')->with('user',$user);
    }

    public function addToOrderTable()
    {
        $order = Order::create([
            'user_id' => Auth::id(),
            'status_id' => 1,
            'total_price'=>totalPay()
        ]);
        foreach (Cart::content() as $item) {
            $ordered = OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
                'price'=>$item->model->price
            ]);

            $product = Product::find($item->model->id);
            $remaining = $product->count - $ordered->quantity;
            $product->update(['count' => $remaining]);
        }

        Cart::destroy();
        return redirect('/');
    }

    /**
     * @return mixed
     */
    private function getCheckOutInfo()
    {

        $user= Auth::user();
        $address = $user->address() ? $user->address()->first() : null;

        if ( is_null($address)){
            Session::flash('address','لطفا آدرس و اطلاعات خود را جهت ارسال کالا وارد کنید');
            return redirect('/address');
        }
        return $user;
    }
}
