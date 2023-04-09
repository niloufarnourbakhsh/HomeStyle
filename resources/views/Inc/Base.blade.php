@include('Inc.header')
<html>

<header class="container-fluid p-2 d-flex justify-content-around" id="nav-section">
    <div class="d-inline-flex p-2">
        <form action="{{route('search')}}" class="d-inline-flex">
            @csrf
            <input type="text" class="form-control rounded p-2" placeholder="جستجو ..." aria-label="search" name="search">
            <button type="submit" class="btn-link bg-black btn-link"><p class="p-2"><i
                        class="fas fa-search fa-2x text-white"></i></p></button>
        </form>
    </div>
    <div>
        <p class="h3 p-2 text-white">Home Decor shop</p>
    </div>
    <div class="pt-2">
        <i class="fas fa-laptop-house fa-3x logo"></i>
    </div>
</header>
<nav id="menu" class="d-flex flex-row justify-content-around">
    <ul class="nav">
        <li class="nav-item  p-3"><a href="{{url('/')}}" class="text-white p-3">صفحه ی اصلی</a></li>
        @if(auth()->user())
            @if(auth()->user()->checkTheAdmin())
        <li class="nav-item  p-3"><a href="{{url('/admin')}}" class="text-white p-3"> مدیریت </a></li>
        @endif
        @endif
        <li class="nav-item p-3"><a href="{{url('/products')}}" class="text-white p-3">محصولات</a></li>
        <li class="nav-item p-3"><a href="#" class="text-white p-3">درباره ی ما</a></li>
        <li class="nav-item p-3"><a href="#" class="text-white p-3">تماس با ما</a></li>
    </ul>

    <ul class="nav">
        <li class="nav-item  p-3">
            <div>
                {{--            @if(\Gloudemans\Shoppingcart\Facades\Cart::count()>0)--}}
                <a href="{{url('/cart')}}" class="text-white p-3 pr-5">
                    <i class="fas fa-shopping-basket fa-2x"></i>
                    <i class="fa-regular fa-basket-shopping-simple"></i>
                </a>
                {{--                 <span class="bg-purple rounded-circle cart-padding">{{\Gloudemans\Shoppingcart\Facades\Cart::count()}}</span>--}}
                {{--            @endif--}}
            </div>
        </li>
        @if(Auth::check())
            <li class="nav-item  p-3"><a href="{{url('/order')}}" class="text-white"><p>لیست سفارشات</p></a></li>
            <li class="nav-item  p-3">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-link text-white" type="submit">
                        <i class="fas fa-sign-out-alt fa-2x"></i>
                    </button>
                </form>
            </li>
        @else
            <li class="nav-item  p-3"><a href="{{route('login')}}" class="text-white "><p>ورود / عضویت</p></a></li>
        @endif
    </ul>
</nav>
@yield('body')
<footer class="p-2 mt-5" id="Footer">
    <div class="container p-2">
        <div class="row">
            <div class="col-4">
                <p class="text-white text-center p-2">
                    آنلاین دکور یک فروشگاه آنلاین برای خرید خونه
                </p>
            </div>
            <div class="col-4 d-inline-flex">
                <p class="text-white text-center p-2">ارتباط با ما: </p>
                <div class="text-center">
                    <i class="fab fa-instagram text-white fa-2x p-2"></i>
                    <i class="fab fa-whatsapp text-white fa-2x p-2"></i>
                    <i class="fab fa-twitter text-white fa-2x p-2 "></i>
                </div>
            </div>
            <div class="col-4">
                <p class="text-white text-center p-2">
                    تمامی حقوق مادی و معنوی برای فروشگاه آنلاین دکور محفوظ است.
                </p>
            </div>
        </div>
    </div>
</footer>
@yield('js-part')
@yield('extra-js')
</html>
</body>
