@extends('Inc.Base')

@section('body')
    <div class="container mt-5">

        <div class="row">

            <aside class="col-3 bg-white pr-3 text-right bg-warning">
                <div>
                    <p class="h5 p-3 bg-purple rounded text-white">{{Auth::user()->name}} </p>
                    <ul class="nav flex-column">
                        <li class=" border-purple p-3"><a
                                href=""
                                class="text-dark font-weight-bold"> لیست سفارشات</a></li>
                        <li class=" border-purple p-3"><a
                                href=""
                                class="text-dark font-weight-bold"> سبد خرید</a></li>
                        <li class=" border-purple p-3"><a
                                href=""
                                class="text-dark font-weight-bold"> آدرس</a></li>
                        <li class=" border-purple p-3"><a
                                href=""
                                class="text-dark font-weight-bold"> خروج از سامانه</a></li>
                    </ul>
                </div>
            </aside>
            <div class="col-6 p-3">
                @if(\Illuminate\Support\Facades\Session::has('address'))
                    <p class="bg-light text-primary">
                        {{\Illuminate\Support\Facades\Session::get('address')}}
                    </p>
                @endif
                <form action="{{url('/address/'. $user->id )}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="mb-2"> نام گیرنده:</label>
                        <input type="text" name="name" id="name" class="form-control" required value="{{$user->name}}">
                    </div>

                    <div class="form-group">
                        <label for="number" class="mb-2">شماره ی تماس:</label>
                        <input type="text" name="number" id="number" class="form-control" required
                               value="{{$user->number}}">
                    </div>

                    <div class="form-group">
                        <label for="address" class="mb-2"> آدرس:</label>
                        <textarea name="address" id="address" class="form-control"
                                  required> {{ $address? $address->address : null}} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="postal_id" class="mb-2"> کد پستی:</label>
                        <input type="text" name="postal_id" id="postal_id" class="form-control" required
                               value="{{ $address? $address->postal_id : null}}">
                    </div>

                    <button class="btn btn-lg btn-block btn-success mt-3">ذخیره</button>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
@endsection
