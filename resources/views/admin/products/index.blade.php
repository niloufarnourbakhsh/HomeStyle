@extends('admin.admin-base')

@section('manager-part')
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-2">
                <ul class="nav d-flex flex-column  text-center">
                    <p class="h5 p-3 bg-purple rounded "><a href="{{route('products.all')}}" class="text-white">براساس
                            محصولات</a></p>
                    @foreach($categories as $category)
                        <li class="p-3 border-purple "><a href="{{route('products.all',['category='.$category->name])}}"
                                                         class="text-dark">{{$category->name}}</a></li>

                    @endforeach
                </ul>
            </div>
            <div class="col-1"></div>
            <div class="col-9 bg-light">
                <p class="h5">{{$categoryName}}</p>
                <table class="table">
                    <thead>
                    <th>Id</th>
                    <th>اسم محصول</th>
                    <th>تصویر</th>
                    <th>نمایش</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>
                                <img src="{{url('/storage/'.$product->images()->first()->path)}}" alt=""
                                     class="image-size">
                            </td>
                            <td><a href="{{url('/product/'.$product->slug)}}"><i
                                        class="far fa-eye pt-2 text-show fa-2x"></i></a></td>
                            <td><a href="{{url('/product/edit/'.$product->id)}}"><i
                                        class="fas fa-pen text-edit  pt-2 fa-2x"></i></a></td>
                            <td>
                                <form action="{{url('/product/'.$product->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn"><i class="fas fa-trash fa-2x pt-2 text-red "></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
