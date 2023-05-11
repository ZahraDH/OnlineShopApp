@extends('admin.dashboard')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <h2> دیدگاه ثبت شده</h2>

            </div>

            <div class="pull-left">

                <a class="btn btn-primary" href="{{ route('show-comments') }}"> بازگشت به صفحه قبل</a>

            </div>

        </div>

    </div>


    <table class="table table-bordered">

        <tr>

            <th>نام کاربر</th>

            <th>تاریخ</th>

            <th>متن دیدگاه</th>

            <th> نام کالا </th>

        </tr>


	    <tr>


	        <td>{{ $comment->user->name }}</td>

	        <td>{{ date('Y-m-d', strtotime($comment->created_at)); }}</td>

            <td>{{ $comment->comment }}</td>

            <td>{{ $comment->product->name }}</td>


	    </tr>
     

    </table>




@endsection