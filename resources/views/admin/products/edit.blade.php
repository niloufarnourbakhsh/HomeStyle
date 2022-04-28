@extends('admin.admin-base')

@section('manager-part')
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-7">
                @if(Session::has('delete_image'))
                    <p class=" text-danger"> {{Session('delete_image')}}</p>
                @endif
                <p class="p-3 h5 bg-purple text-white">ویرایش کردن محصول </p>
                <form action="{{url('/product/'.$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group m-3">
                        <label for="name" class="mb-2">اسم محصول:</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$product->name}}">
                        @if($errors->first('name'))
                            <p class="text-danger text-bold">{{$errors->first('name')}}</p>
                        @endif
                    </div>

                    <div class="form-group m-3">
                        <label for="category" class="mb-2">طبقه بندی:</label>
                        <select class="form-select" id="category" name="category_id">
                            @foreach($categories as $category)

                                <option value="{{$category->id}}"
                                        @if($category->id==$product->category_id) selected @endif>
                                    {{$category->name}}
                                </option>

                            @endforeach
                        </select>
                        @if($errors->first('category_id'))
                            <p class="text-danger text-bold">{{$errors->first('category_id')}}</p>
                        @endif
                    </div>

                    <div class="form-group m-3">
                        <label for="details" class="mb-2"> جزيیات محصول:</label>
                        <input type="text" class="form-control" name="details" id="details"
                               value="{{$product->details}}">
                        @if($errors->first('details'))
                            <p class="text-danger text-bold">{{$errors->first('details')}}</p>
                        @endif
                    </div>

                    <div class="form-group m-3">
                        <label for="description" class="mb-2"> توضیحات بیشتر:</label>
                        <textarea name="description" id="description"
                                  class="form-control">{{$product->description}}</textarea>
                        @if($errors->first('description'))
                            <p class="text-danger text-bold">{{$errors->first('description')}}</p>
                        @endif
                    </div>
                    <div class="form-group m-3">
                        <label for="count" class="mb-2"> تعداد موجودی:</label>
                        <input type="text" class="form-control" name="count" id="count" value="{{$product->count}}">
                        @if($errors->first('count'))
                            <p class="text-danger text-bold">{{$errors->first('count')}}</p>
                        @endif
                    </div>
                    <div class="form-group m-3">
                        <label for="price" class="mb-2">قیمت :</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{$product->price}}">
                        @if($errors->first('price'))
                            <p class="text-danger text-bold">{{$errors->first('price')}}</p>
                        @endif
                    </div>

                    <div class="form-group m-3">
                        <label for="images" class="mb-2">تصویر :</label>
                        <input type="file" class="form-control" name="images[]" id="images" accept="image/*" multiple>
                        @if($errors->first('images'))
                            <p class="text-danger text-bold">{{$errors->first('images')}}</p>
                        @endif
                    </div>

                    <button class="btn btn-orange btn-lg m-3 mb-5" type="submit">ذخیره</button>
                </form>
            </div>
            <div class="col-5 ">
                <div class="row row-cols-3 mb-2">
                    @foreach($product->images as $image)
                        <div class="card rounded">
                            <img src="{{url('/storage/'.$image->path)}}" alt="" class="img-size">
                            <div class="card-body">
                                <form action="{{url('/image/delete/'.$image->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-lg bg-danger">delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
