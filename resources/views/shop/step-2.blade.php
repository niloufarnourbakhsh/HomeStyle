@extends('Inc.Base')
@section('body')

    <div class="container mt-5">
        <h4 class="text-muted p-4 ">اطلاعات سفارش کالا</h4>
        <div class="row">
            <div class="col-8 ">
                <div class="p-2 border border-dark rounded bg-light-gray ">

                    <p><i class="fas fa-map"></i><span class="p-3 h6 ">انتخاب آدرس</span></p>
                </div>
                <div class="p-2 dashed-border mt-5 p-4">
                    <p>نام گیرنده: {{ Auth::user()->name }}</p>
                    <p>
                        {{$user->address->address}}
                    </p>
                    <p>کد پستی:
                        {{$user->address->postal_id}}
                    </p>
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
                            <p>15000 </p></li>
                        <li class="list-group-item d-flex justify-content-between">
                            <p>مبلغ قابل پرداخت</p>
                            <p>{{payByShipping()}}</p>
                        </li>
                    </ul>


                </div>
                <a href="{{url('/checkout/step-3')}}" class="btn btn-lg d-block btn-green mt-3 p-3 mb-4">ادامه ی ثبت
                    سفارش</a>
            </div>
        </div>
    </div>
@endsection
