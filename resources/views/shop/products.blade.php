@extends('Inc.Base')
@section('title','لیست محصولات')
@section('body')
    <div class="container-fluid  pr-3 mt-5 " id="products-part">

        <div class="row">
            <aside class="col-3 bg-white pr-3 text-right bg-warning">
                <div>
                    <p class="h5 p-3 bg-purple rounded text-white">براساس قیمت</p>
                    <ul class="nav flex-column">

                        <li class=" border-purple p-3"><a
                                href="{{route('products',['category='=>request()->category,'sort'=>'high_to_low'])}}"
                                class="text-dark font-weight-bold">کمترین قیمت</a></li>
                        <li class=" border-purple p-3"><a
                                href="{{route('products',['category='=>request()->category,'sort'=>'low_to_high'])}}"
                                class="text-dark font-weight-bold">بیشترین قیمت</a></li>

                    </ul>
                </div>
                <div class="mt-5 mb-4">
                    <p class="h5 p-3 bg-purple rounded text-white">براساس محصولات</p>
                    <ul class="nav flex-column mb-4" id="aside-part">
                        @foreach($categories as $category )
                            <li class="border-purple p-3"><a href="{{route('products',['category='.$category->name])}}"
                                                             class="text-dark font-weight-bold"> {{$category->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>

            <section class="col-9 p-3 bg-product-part">

                <span class="h4 logo">{{$categoryName}}</span>
                <div class="row row-cols-4 mb-4 mt-4">

                    @forelse($products as $product)
                        <div class="col pb-3">
                            <div class="card rounded">
                                <a href="{{url('/product/'.$product->slug)}}">
                                    <img src="{{url('/storage/'.$product->images()->first()->path)}}" alt=""
                                         class="card-img-top img-size">
                                    <p class="card-body text-dark fw-bolder">
                                        {{$product->name}}
                                        @if($product->count > 0)
                                            <span class="text-success"> {{$product->price}}</span>
                                        @else
                                            ناموجود
                                        @endif
                                    </p>
                                </a>
                            </div>

                        </div>
                    @empty
                        <p class="text-center mb-5 m-auto h4">محصولی موجود نیست </p>
                    @endforelse

                </div>
                <div class=" mt-4 text-success">{{$products->appends(request()->input())->links()}}</div>
            </section>
        </div>
    </div>


@endsection


