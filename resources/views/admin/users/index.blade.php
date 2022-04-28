@extends('admin.admin-base')

@section('manager-part')
    <div class="container-fluid pt-2">
        <div class="row">
            <p class="text-center p-3 h4 items-color">لیست اعضا</p>
            <div class="col-2"> </div>
            <div class="col-10 bg-light">

                    <table class="table">
                        <thead>

                        <th>نام کاربر</th>
                        <th>سفارشات</th>
                        <th>حذف</th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><p>{{$user->name}}</p></td>
                                <td>
                                    <a href="">
                                        <i class="far fa-eye pt-2 text-edit fa-2x"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{url('/user/'.$user->id)}}" method="POST">
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
