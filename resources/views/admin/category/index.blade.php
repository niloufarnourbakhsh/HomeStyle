@extends('admin.admin-base')

@section('manager-part')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-5">
                <form action="{{url('/category/')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group text-right">
                        <label for="category" class="font-weight-bold mb-2"> اسم کالکشن: </label>
                        <input type="text" name="name" class="form-control" id="category">
                        @if($errors->first('name'))
                            <p class="text-danger text-bold">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="form-group text-right">
                        <label for="cover" class="font-weight-bold mb-2">:عکس کاور</label>
                        <input type="file" id="cover" name="image" class="form-control">
                        @if($errors->first('image'))
                            <p class="text-danger text-bold">{{$errors->first('image')}}</p>
                        @endif
                    </div>
                    <button class="btn btn-orange mt-4 btn-lg" type="submit">ذخیره</button>
                </form>
            </div>

            <div class="col-1"></div>
            <div class="col-5 text-right">
                <h5 class=" mb-4">کالکشن های موجود:</h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">اسم کالکشن</th>
                        <th scope="col">ویرایش</th>
                        <th scope="col">حذف</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td colspan="2">
                                <form action="{{url('/category/'.$category->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex flex-row text-right justify-content-around">
                                        <label for="category_name"></label>
                                        <input type="text" name="category"  id="category_name" value="{{$category->name}} "
                                               class="form-control" required>
                                        <button type="submit" class="btn btn-orange"> ویرایش</button>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <form action="{{url('/category/'.$category->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-link" type="submit"><i
                                            class="fas fa-minus-circle fa-2x text-danger"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
@endsection
