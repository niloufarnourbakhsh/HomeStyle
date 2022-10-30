@extends('Inc.Base')
@section('title','ورود و عضویت')
@section('body')

    <div class="container mt-5">
        <div class="row">
            <div class="col-5 p-3">
                <h5 class="text-muted text-center">ورود به وبسایت </h5>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email"> ایمیل : </label>
                        <input type="text" name="email" class="form-control my-input-style" id="email">
                        @if($errors->first('email'))
                            <p>
                                {{$errors->first('email')}}
                            </p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email" class="mb-2"> رمز عبور :</label>
                        <input id="password" type="password" class="form-control" name="password" required
                               autocomplete="current-password">

                        @error('password')
                        <strong>{{ $message }}</strong>
                        @enderror

                        <button class="btn btn-lg bg-red text-light mt-3">ورود به وبسایت</button>
                    </div>
                </form>
            </div>
            <div class="col-2 p-3 "></div>

            <div class="col-5 p-3">
                <h5 class="text-center text-muted">عضویت در وبسایت </h5>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="mb-2">نام :</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                               autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="number" class="mb-2">{{ __('شماره تماس') }}</label>
                        <input id="number" type="text" class="form-control @error('number') is-invalid @enderror "
                               name="number" value="{{ old('number') }}" required autocomplete="number" autofocus>

                        @error('number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="email" class="mb-2">{{ __('پست الکترونیکی ') }}</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                               required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">

                        <label for="password" class="mb-2">{{ __('رمز عبور') }}</label>
                        <input id="password" type="password" class="form-control" name="password" required
                               autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="password-confirm" class="mb-2">{{ __(' تکرار رمز عبور') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required autocomplete="new-password">
                    </div>

                    <button class="btn bg-red btn-lg text-white mt-3">عضویت در وبسایت</button>
                </form>
            </div>
        </div>
    </div>
@endsection
