@extends('Inc.Base')
@section('title',$product->slug)
@section('body')

    <div class="container bg-light mt-5 mb-5" id="product-part" style="min-height: 66vh">
        <div class="row">
            <div class="col-1 ">
                <div class="d-flex flex-column ">
                    @foreach($product->images as $image)
                        <div class="toChoose">

                            <img src="{{url('/storage/'.$image->path)}}" alt="" class="img-size  m-auto p-2 ">
                        </div>

                    @endforeach
                </div>
            </div>

            <div class="col-3 ">

                <img src="{{url('/storage/'.$product->images()->first()->path)}}" alt="" class="img-size m-auto"
                     id="BigImage">
            </div>

            <div class="col-7 text-right p-5">
                <h3 class="mb-3">{{$product->name}}</h3>
                <p class="h5 mb-3">قیمت :{{$product->price}}</p>
                <p class="h5 mb-3">
                    <span class="text-success">تعداد موجود:</span>
                    {{$product->count}}
                </p>
                <p class="lead mt-5">
                    {!! $product->description !!}
                </p>

                <div class="row mt-5">
                    <div class="col-4">
                        <form action="{{url('cart/store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <input type="hidden" name="name" value="{{$product->name}}">
                            <input type="hidden" name="price" value="{{$product->price}}">

                            <button class="btn btn-block bg-navy-blue btn-lg text-white" type="submit">افزودن به سبد
                                خرید
                            </button>
                        </form>

                    </div>
                    <div class="col-4"></div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('js-part')
    <script>
        (function () {
            const BigImage = document.querySelector('#BigImage');
            let images = document.querySelectorAll('.toChoose');
            images.forEach((image) => image.addEventListener('click', function () {
                BigImage.src = this.querySelector('img').src;
                images.forEach((element) => element.classList.remove('image-border'));

                this.classList.add('image-border');
            }))
        })();

    </script>
@endsection
