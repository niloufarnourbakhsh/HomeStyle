@extends('Inc.Base')

@section('body')
    <div class="container mt-5">

        <div class="row">
            <aside class="col-3 bg-white pr-3 text-right bg-warning">
                <div>
                    <p class="h5 p-3 bg-red  rounded text-white">{{ Auth::user()->name }} </p>
                    <ul class="nav flex-column">
                        <li class=" border-purple p-3"><a
                                href="{{url('/order')}}"
                                class="text-dark font-weight-bold"> لیست سفارشات</a></li>
                        <li class=" border-purple p-3"><a
                                href="{{url('/cart')}}"
                                class="text-dark font-weight-bold"> سبد خرید</a></li>
                        <li class=" border-purple p-3"><a
                                href="{{url('/address')}}"
                                class="text-dark font-weight-bold"> آدرس</a></li>
                        <li class=" border-purple p-3">

                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-link text-white" type="submit">
                                    خروج از سامانه
                                </button>
                            </form>
                        </li>

                    </ul>
                </div>
            </aside>

            <section class="col-9 p-3 bg-product-part">
                <div class="d-block bg-light-gray p-3 border-dark">
                    <p>جزییات سفارش</p>
                </div>
                <table class="table mt-3" >
                    <thead>
                    <th>نام محصول</th>
                    <th>تعداد</th>
                    <th>قیمت واحد</th>
                    <th>قیمت کل</th>
                    </thead>
                    <tbody>
                    @foreach($order->OrderProduct as $product)
                        <tr>
                            <td>{{$product->product->name}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{($product->quantity)*($product->price)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col"></div>
                    <div class="col p-5 d-flex flex-row justify-content-around btn-green text-white">
                        <p>مبلغ کل پرداختی</p>
                        <p>{{$order->total_price}}</p>
                    </div>
                </div>
            </section>

                <div class="col-3"></div>
        </div>
    </div>


@endsection
