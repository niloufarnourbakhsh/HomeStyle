@include('Inc.header')
<div class="container-fluid">
    <div class="row">
        <aside class="col-2" id="manger-menu-list">

            <ul class="nav d-flex flex-column" id="admin-menu">
                <li class="p-2 mt-5"><a href="{{url('/admin')}}" class="font-weight-bold text-white">
                        <i class="fa-solid fa-house-chimney items-color p-2 fa-2x"></i>داشبورد</a></li>
                <li class="p-2"><a href="{{url('/category')}}" class="font-weight-bold text-white">
                        <i class="fa-solid fa-bars items-color p-2 fa-2x"></i>
                        طبقه بندی محصولات</a></li>
                <li class="p-2"><a href="{{url('/product/create')}}" class="font-weight-bold text-white">
                        <i class="fa-solid fa-plus items-color p-2 fa-2x"></i>اضافه کردن محصول جدید</a></li>
                <li class="p-2"><a href="{{url('/product')}}" class="font-weight-bold text-white">
                        <i class="fa-solid fa-database items-color p-2 fa-2x"></i>
                        مدیریت محصولات
                    </a></li>
                <li class="p-2"><a href="{{route('users')}}" class="font-weight-bold text-white">
                        <i class="fa-solid fa-users items-color p-2 fa-2x"></i>
                        مدیریت اعضا
                    </a></li>
                <li class="p-2"><a href="{{url('/orders')}}" class="font-weight-bold text-white">
                        <i class="fa-solid fa-cart-shopping items-color p-2 fa-2x"></i> تمامی سفارشات </a></li>
                <li class="p-2">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn text-white text-white" type="submit">
                            <i
                                class="fas fa-sign-out-alt items-color p-2 fa-2x"></i>
                            <span class="font-weight-bold">خروج</span>
                        </button>
                    </form>

            </ul>
        </aside>
        <section class="col-10  " id="manager-content">
            <div class="hr m-auto mt-5 mb-5"></div>
            @yield('manager-part')
        </section>
    </div>
</div>
