@extends('admin.admin-base')

@section('manager-part')
    <div class="container-fluid pt-2">
        <div class="row">
            <table class="table">
                <thead>
                <th>شماره ی سفارش</th>
                <th>نام کاربر</th>
                <th>زمان ثبت سفارش</th>
                <th>جزییات سفارش</th>
                <th scope="col">وضعیت سفارش</th>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->created_at}}</td>
                        <td><a href="{{url('/details/'.$order->id)}}" class="text-white bg-dark p-2 mt-2">نمایش
                                جزییات</a></td>
                        <td>
                            <form action="{{url('/orders/update/'.$order->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="d-flex d-inline-flex">
                                    <label for="status"></label>
                                    <select id="status" name="status" class="form-control status" data-id="{{ $order->status_id}}">
                                        @foreach($statuses as $status)
                                            <option
                                                value="{{$status->id}}" {{$order->status_id===$status->id? 'selected':''}}>{{$status->name}}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-success">ذخیره</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection


