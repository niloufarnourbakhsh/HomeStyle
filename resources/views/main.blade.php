@extends('Inc.Base')
@section('title','صفحه ی اصلی ')
@section('body')
    <section id="mainpage-photo-part">
        <div class="container-fluid" id="mainpage-cover">
            <div class="rounded-circle p-5" id="text-part">
                <p class="text-white "> ما اینجاییم که خونه ی سبزتونو قشنگ کنیم :)</p>
            </div>
        </div>
    </section>

    <div class="container m-auto mt-5 p-3 mb-5">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <p class="text-center card-text">
                            پاسخگویی 24 ساعته<i class="fas fa-phone-volume fa-2x item-color"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <p class="text-center card-text">
                            خرید بالای 300 تومن ارسال رایگان
                            <i class="fas fa-truck-moving fa-2x item-color"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <p class="text-center card-text">
                            بسته بندی کادویی
                            <i class="fas fa-gift fa-2x item-color"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <p class="text-center card-text">
                            ارسال به سراسر ایران
                            <i class="fas fa-truck-moving fa-2x item-color"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container  m-5 p-5">
        <p class="h2 text-center">آلونک</p>
        <p class="text-center lead">ما سعی می کنیم محصولاتمون رو با حوصله و دقت بسازیم تا محصولی به دست شما برسه که
            احساس خوبی رو به خونه تون منتقل بکنه</p>
    </div>
    <div class="container m-5" id="category_part">
        <p class="text-center h4 mb-5">دسته بندی محصولات </p>
        <div class="row row-cols-6 mb-5">
            @foreach($categories as $category)
                <div class="col">
                    <div class="card rounded">
                        <a href="{{route('products',['category='.$category->name])}}">
                            <img
                                src="{{url('/storage/'.$category->images()->first()->path)}}"
                                alt="" class="card-img-top img-size">
                            <p class="card-img-overlay text-center text-bold">
                                <span class="text-dark p-2 rounded-circle bg-blue">{{$category->name}} </span>
                            </p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

