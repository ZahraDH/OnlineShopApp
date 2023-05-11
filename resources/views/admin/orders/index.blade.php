@extends('admin.dashboard')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <h2> سفارشات ثبت شده</h2>

            </div>

        </div>

    </div>


    <table class="table table-bordered">

        <tr>

            <th>#</th>

            <th>نام</th>

            <th>تاریخ</th>

            <th>وضعیت</th>

            <th>قیمت کل </th>

            <th>اقدامات</th>

        </tr>

        @hasanyrole('Admin')
        @foreach ($orders_for_admin as $order)

	    <tr>

	        <td>{{ ++$i }}</td>

	        <td>{{ $order->user->name }}</td>

	        <td>{{ date('Y-m-d', strtotime($order->created_at));  }}</td>

            <td>@if ($order->status == 1)
                <span class="badge badge-success">موفق</span>
            @else
                <span class="badge badge-danger">ناموفق</span>
            @endif</td>

            <td>@if (isset($order->total_amount))
                {{ $order->total_amount }}
            @endif</td>

	        <td>
                <a class="btn btn-info" href="{{ route('show-order-details',$order->id) }}">نمایش</a>
	        </td>

	    </tr>

	    @endforeach
        @endrole
	    @hasanyrole('supplier')
        @foreach ($orderItems_of_sellers as $orderItem)

	    <tr>

	        <td>{{ ++$i }}</td>

	        <td>{{ $orderItem->user->name }}</td>

	        <td>{{ date('Y-m-d', strtotime($orderItem->created_at)); }}</td>

            <td>@if ($orderItem->status == 1)
                موفق
            @else
                ناموفق
            @endif</td>

            <td>@if (isset($orderItem->order->total_amount))
                {{ $orderItem->order->total_amount }}
            @endif</td>

	        <td>


                    <a class="btn btn-primary" href="{{ route('show-order-details',$orderItem->id) }}">نمایش</a>

	        </td>

	    </tr>

	    @endforeach
        @endrole

    </table>


    {!! $orders_for_admin->links() !!}



@endsection