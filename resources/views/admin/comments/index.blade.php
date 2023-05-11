@extends('admin.dashboard')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <h2> دیدگاه های ثبت شده</h2>

            </div>

        </div>

    </div>


    <table class="table table-bordered">

        <tr>

            <th>#</th>

            <th>نام کاربر</th>

            <th>تاریخ</th>

            <th>متن دیدگاه</th>

            <th>اقدامات</th>

        </tr>

        @hasanyrole('Admin')
        @foreach ($comments as $comment)

	    <tr>

	        <td>{{ ++$i }}</td>

	        <td>{{ $comment->user->name }}</td>

	        <td>{{ date('Y-m-d', strtotime($comment->created_at));  }}</td>

            <td>{{$comment->comment}}</td>

	        <td>
                <form action="{{ route('delete_comment',$comment->id) }}" method="POST">
                    @csrf
                    <a class="btn btn-primary" href="{{ route('show-comment-details',$comment->id) }}">نمایش</a>
                    
                    @method('DELETE')
                    @can('comment-delete')

                    <button type="submit" class="btn btn-danger">حذف</button>

                    @endcan
                </form>
	        </td>

	    </tr>

	    @endforeach
        @endrole
	    @hasanyrole('supplier')
        @foreach ($comments_for_sellers as $comment)

	    <tr>

	        <td>{{ ++$i }}</td>

	        <td>{{ $comment->user->name }}</td>

	        <td>{{ date('Y-m-d', strtotime($comment->created_at)); }}</td>

            <td>{{$comment->comment}}</td>

	        <td>
                <form action="{{ route('delete_comment',$comment->id) }}" method="POST">
                    @csrf
                    <a class="btn btn-primary" href="{{ route('show-comment-details',$comment->id) }}">نمایش</a>
                    @method('DELETE')

                    @can('comment-delete')

                    <button type="submit" class="btn btn-danger">حذف</button>

                    @endcan
                </form>
	        </td>

	    </tr>

	    @endforeach
        @endrole

    </table>


   

    {!! $comments->links() !!}


@endsection