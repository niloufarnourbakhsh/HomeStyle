@extends('admin.admin-base')

@section('manager-part')
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-8">
                <p class="p-3 h5 bg-purple text-white">اضافه کردن محصول جدید</p>
                <form action="{{url('product/store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group m-3">
                        <label for="name" class="mb-2">اسم محصول:</label>
                        <input type="text" class="form-control" name="name" id="name">
                        @if($errors->first('name'))
                            <p class="text-danger text-bold">{{$errors->first('name')}}</p>
                        @endif
                    </div>

                    <div class="form-group m-3">
                        <label for="category" class="mb-2">طبقه بندی:</label>

                        <select class="form-select" id="category" name="category_id">
                            @foreach($categories as $category)

                                <option value="{{$category->id}}">{{$category->name}}</option>

                            @endforeach
                        </select>
                        @if($errors->first('category_id'))
                            <p class="text-danger text-bold">{{$errors->first('category_id')}}</p>
                        @endif
                    </div>

                    <div class="form-group m-3">
                        <label for="details" class="mb-2"> جزيیات محصول:</label>
                        <input type="text" class="form-control" name="details" id="details">
                        @if($errors->first('details'))
                            <p class="text-danger text-bold">{{$errors->first('details')}}</p>
                        @endif
                    </div>

                    <div class="form-group m-3">
                        <label for="description" class="mb-2"> توضیحات بیشتر:</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                        @if($errors->first('description'))
                            <p class="text-danger text-bold">{{$errors->first('description')}}</p>
                        @endif
                    </div>
                    <div class="form-group m-3">
                        <label for="count" class="mb-2"> تعداد موجودی:</label>
                        <input type="text" class="form-control" name="count" id="count">
                        @if($errors->first('count'))
                            <p class="text-danger text-bold">{{$errors->first('count')}}</p>
                        @endif
                    </div>
                    <div class="form-group m-3">
                        <label for="price" class="mb-2">قیمت :</label>
                        <input type="text" class="form-control" name="price" id="price">
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
            <div class="col-4"></div>
        </div>
    </div>

@endsection
