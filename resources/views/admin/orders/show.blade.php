@extends('admin.dashboard')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <h2> سفارشات ثبت شده</h2>

            </div>

            <div class="pull-left">

                <a class="btn btn-primary" href="{{ route('show-orders') }}"> بازگشت به صفحه قبل</a>

            </div>

        </div>

    </div>


    <table class="table table-bordered">

        <tr>

            <th>#</th>

            <th>نام محصول</th>

            <th>قیمت محصول </th>

            <th>تخفیف</th>

            <th>زیر کل </th>

            <th>تعداد</th>

        </tr>

        @foreach ($orderItems as $orderItem)

	    <tr>

	        <td>{{ ++$i }}</td>

	        <td>{{ $orderItem->product->name }}</td>

	        <td>{{ $orderItem->price }}</td>

            <td>{{ (( $orderItem->discount * $orderItem->price ) /100) * $orderItem->quantity }}</td>

            <td>{{ $orderItem->subtotal }}</td>

            <td>{{$orderItem->quantity}}</td>

	    </tr>

	    @endforeach
     

    </table>




@endsection