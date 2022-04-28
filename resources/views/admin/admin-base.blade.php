@include('Inc.header')
<div class="container-fluid">
    <div class="row">
        <aside class="col-2" id="manger-menu-list">

            <ul class="nav d-flex flex-column" id="admin-menu">
                <li class="p-2 mt-5"><a href="{{url('/admin')}}" class="font-weight-bold text-white"><i
                            class="fas fa-home items-color p-2 fa-2x"></i>داشبورد</a></li>
                <li class="p-2"><a href="{{url('/category')}}" class="font-weight-bold text-white"><i
                            class="fas fa-bars items-color p-2 fa-2x"></i> طبقه بندی محصولات</a></li>
                <li class="p-2"><a href="{{url('/products/create')}}" class="font-weight-bold text-white"><i
                            class="fas fa-plus items-color p-2 fa-2x"></i>اضافه کردن محصول جدید</a></li>
                <li class="p-2"><a href="" class="font-weight-bold text-white">صفحه ی اصلی</a></li>
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
