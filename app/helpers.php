<?php

use Gloudemans\Shoppingcart\Facades\Cart;

function totalPay(){

    $totalPay=0;
    foreach (Cart::content() as $item){

        $price =($item->model->price) * ($item->qty);

        $totalPay += $price;
    }

    return $totalPay;
}

function payByShipping(){

    $shipping=15000;
   return totalPay() + $shipping;

}
