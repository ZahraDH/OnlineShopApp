@extends('admin.dashboard')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <h2>فروشنده ها</h2>

            </div>

            <div class="pull-left">

                @can('supplier-create')

                <a class="btn btn-success" href="{{ route('brands.create') }}">اضافه کردن  فروشنده جدید</a>

                @endcan

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

            <th>No</th>

            <th>نام فروشگاه </th>

            <th width="280px">اقدامات</th>

        </tr>

	    @foreach ($brands as $brand)
	    <tr>

	        <td>{{ ++$i }}</td>

	        <td>{{$brand->brand_name}}</td>

	        <td>

                <form action="{{ route('brands.destroy',$brand->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('brands.show',$brand->id) }}">نمایش</a>

                    @can('supplier-edit')

                    <a class="btn btn-primary" href="{{ route('brands.edit',$brand->id) }}">ویرایش</a>

                    @endcan


                    @csrf

                    @method('DELETE')

                    @can('supplier-delete')

                    <button type="submit" class="btn btn-danger">حذف</button>

                    @endcan

                </form>

	        </td>

	    </tr>

	    @endforeach

    </table>


    {!! $brands->links() !!}


@endsection