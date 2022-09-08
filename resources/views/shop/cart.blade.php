@extends('Inc.Base')
@section('body')

    <div class="container" style="min-height: 66vh">
        <div class="p-3">
            @if(\Illuminate\Support\Facades\Session::has('success_message'))
                <p class="text-success pt-5">{{\Illuminate\Support\Facades\Session::get('success_message')}}</p>
            @endif
        </div>
        @if(\Gloudemans\Shoppingcart\Facades\Cart::count()>0)
            <div>
                <p><span class="bg-red text-light rounded p-2">{{\Gloudemans\Shoppingcart\Facades\Cart::count()}}</span> محصول
                    در سبد خرید شما هست</p>
            </div>
        @endif

        @if(\Gloudemans\Shoppingcart\Facades\Cart::count()>0)
            <div class="row mt-5 mb-5">
                <div class="col-9 bg-light">
                    <table class="table">
                        <thead class="p-4">
                        <tr class="pb-3">
                            <th>نام محصول</th>
                            <th>قیمت</th>
                            <th>تعداد</th>
                            <th>قیمت کل</th>
                            <th> حذف</th>
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
                                <td>{{$item->model->price}}</td>
                                <td>
                                    <select class="form-control count" name="count" data-id="{{ $item->rowId }}">
                                        @for($i=1; $i <=$item->model->count; $i++)
                                            <option
                                                value="{{$i}}" {{ $item->qty == $i ? 'selected': ' '}}>{{$i}}</option>
                                        @endfor
                                    </select>
                                </td>
                                <td>{{{($item->model->price)*($item->qty)}}}</td>

                                <td>
                                    <form action="{{url('cart/remove/'.$item->rowId)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn text-muted" type="submit"><i
                                                class="far fa-trash-alt fa-2x"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="col-3 p-3 border border-2 rounded">
                    <p class="h5 fw-bolder">مجموع کل سبد خرید</p>
                    <div class="d-flex justify-content-around pt-4 border-bottom">
                        <p> قیمت کل </p>
                        <td>{{totalPay()}}</td>
                    </div>

                    <div class="border-bottom p-3">
                        <p class="h6 fw-bolder pb-2">حمل و نقل</p>
                        <p>ارسال به تمام نقاط کشور 15000 تومان</p>
                    </div>

                    <div class="d-flex justify-content-around pt-4">
                        <p class="fw-bolder"> مجموع </p>
                        <p class="fw-bolder">{{payByShipping()}}</p>
                    </div>

                    <div class="justify-content-center ">
                        <a href="{{url('/checkout/step-2')}}" class="btn  btn-block btn-lg btn-success pt-3">پرداخت</a>
                    </div>
                </div>
            </div>
        @else
            <div class="display-6 text-center mt-5">
                <p class="text-muted">کالایی در سبد خرید شما ذخیره نشده است</p>
                <i class="fas fa-shopping-basket logo"></i>
            </div>
        @endif
    </div>

@endsection
@section('js-part')

    <script src="{{asset('/js/app.js')}}" type="application/javascript"></script>

    <script>
        (function () {
            const classname = document.querySelectorAll('.count');

            Array.from(classname).forEach(function (element) {

                element.addEventListener('change', function () {

                    const id = element.getAttribute('data-id');
                    axios.put(`/Apps/HomeStyle/public/cart/update/${id}`, {
                        quantity: this.value
                    })
                        .then(function (response) {
                            console.log(response);

                            window.location.href = "{{route('cart.index')}}";
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                });
            });

        })();
    </script>
@endsection
