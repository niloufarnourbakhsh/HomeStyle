@extends('Inc.Base')
@section('body')

    <div class="container mt-5">
        <h4 class="text-muted p-4 ">اطلاعات سفارش کالا</h4>
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-dark">
                        اقلام سفارشی
                    </div>
                    <div class="bg-light">
                        <table class="table">
                            <thead class="p-4">
                            <tr class="pb-3">
                                <th>تصویر</th>
                                <th>نام محصول</th>
                                <th>قیمت</th>
                                <th>تعداد</th>
                                <th>قیمت کل</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $item)
                                <tr class="pt-3 ">
                                    <td>
                                        <a href="#">
                                            <img src="{{url('/storage/'.$item->model->images()->first()->path)}}" alt=""
                                                 class=" m-auto p-2" style="height: 100px; width: 100px">
                                        </a>
                                    </td>
                                    <td>{{$item->model->name}}</td>
                                    <td>{{$item->model->price}}</td>
                                    <td>
                                        <p>{{$item->qty}}</p>
                                    </td>
                                    <td>{{{($item->model->price)*($item->qty)}}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        آدرس ارسالی
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">نام گیرنده: {{$user->name}}</h5>
                        <p class="card-text">{{$user->address->address}}</p>
                        <p>کد پستی: {{$user->address->postal_id}}</p>

                    </div>

                </div>
            </div>
            <div class="col-4">

                <div class="card">
                    <div class="card-header">
                        جزییات پرداخت
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <p>مبلغ کل</p>
                            <p>{{totalPay()}}</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <p> هزینه ارسال</p>
                            <p>15000</p></li>
                        <li class="list-group-item d-flex justify-content-between">
                            <p>مبلغ قابل پرداخت</p>
                            <p>{{payByShipping()}}</p>
                        </li>
                    </ul>


                </div>
                <a href="{{url('/done')}}" class="btn btn-lg d-block btn-green mt-3 p-3 mb-4">ادامه ی ثبت سفارش</a>
            </div>
        </div>
    </div>
@endsection
