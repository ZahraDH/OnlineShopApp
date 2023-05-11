@extends('admin.dashboard')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <h2>مجوزها</h2>

            </div>

            <div class="pull-left">

                

                <a class="btn btn-success" href="{{ route('permission.create') }}">اضافه کردن مجوز جدید</a>

              

            </div>

        </div>

    </div>


    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif


    <table class="table table-bordered">

        <tr>

            <th>#</th>

            <th>نام</th>

            <th>guard_name</th>

            <th width="280px">مجوزها</th>

        </tr>

	    @foreach ($permissions as $permission)

	    <tr>

	        <td>{{ ++$i }}</td>

	        <td>{{ $permission->name }}</td>

	        <td>{{ $permission->guard_name }}</td>

	        <td>

                <form action="{{ route('permission.destroy',$permission->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('permission.show',$permission->id) }}">نمایش</a>

                    <a class="btn btn-primary" href="{{ route('permission.edit',$permission->id) }}">ویرایش</a>


                    @csrf

                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">حذف</button>

                </form>

	        </td>

	    </tr>

	    @endforeach

    </table>


    {!! $permissions->links() !!}


@endsection