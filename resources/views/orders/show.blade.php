@extends('Inc.Base')
@section('body')
    <div class="container-fluid pr-3 mt-5">
        <div class="row">
            <aside class="col-3 bg-white pr-3 text-right bg-warning">
                <div>
                    <p class="h5 p-3 bg-purple rounded text-white">{{ Auth::user()->name }} </p>
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
                                <button class="btn text-dark" type="submit">
                                    خروج از سامانه
                                </button>
                            </form>
                        </li>

                    </ul>
                </div>
            </aside>

            <div class="col-9">
                <div class="d-block bg-light-gray p-3 border-dark">
                    <p>لیست سفارش</p>
                </div>
                <table class="table">
                    <thead>
                    <th>شماره ی سفارش</th>
                    <th>مبلغ</th>
                    <th>تاریخ</th>
                    <th> وضعیت سفارش</th>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td> {{$order->total_price}}</td>
                            <td>{{$order->created_at->diffForhumans()}}</td>
                            <td>{{$order->status->name}}</td>
                            <td><a href="{{url('/details/'.$order->id)}}" class="text-dark">نمایش جزییات</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

