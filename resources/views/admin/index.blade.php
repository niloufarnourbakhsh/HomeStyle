@extends('admin.admin-base')
@section('manager-part')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="row row-cols-2">
                    <div class="col mb-3 text-center rounded" id="">
                        <div class="card">
                            <a href="{{url('/category')}}" class="bg-dark-green text-white p-4">
                                مدیریت طبقه بندی محصولات
                            </a>
                        </div>
                    </div>
                    <div class="col mb-3 text-center rounded ">
                        <div class="card  ">
                            <a href="{{url('/products/create')}}" class="p-4 border-0 bg-purple text-white">
                                اضافه کردن محصول جدید
                            </a>
                        </div>
                    </div>
                    <div class="col mb-3  text-center rounded ">
                        <div class="card ">
                            <a href="{{url('/products/admin')}}" class=" p-4 bg-lighter-green text-white">
                                مدیریت محصولات
                            </a>
                        </div>
                    </div>
                    <div class="col mb-3  text-center rounded">
                        <div class="card ">
                            <a href="{{route('users')}}" class="p-4 bg-dark-green text-white">
                                مدیریت اعضا
                            </a>
                        </div>
                    </div>
                    <div class="col mb-3 text-center rounded">
                        <div class="card ">
                            <a href="{{url('/orders')}}" class="p-4 bg-purple text-white">
                                تمامی سفارشات
                            </a>
                        </div>
                    </div>
                    <div class="col mb-3 text-center rounded">
                        <div class="card ">
                            <a href="{{url('/order/status/1')}}" class="p-4 bg-lighter-green text-white">
                                سفارشات ثبت شده
                            </a>
                        </div>
                    </div>
                    <div class="col mb-3 text-center rounded">
                        <div class="card ">
                            <a href="{{url('/order/status/2')}}" class="p-4 bg-dark-green text-white">
                                سفارشات پردازش شده
                            </a>
                        </div>
                    </div>

                    <div class="col mb-3 text-center rounded">
                        <div class="card ">
                            <a href="{{url('/order/status/3')}}" class="p-4 bg-purple text-white">
                                سفارشات ارسال شده
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
@endsection
