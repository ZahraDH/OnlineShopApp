@extends('admin.dashboard')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <h2>محصولات</h2>

            </div>

            <div class="pull-left">

                @can('product-create')

                <a class="btn btn-success" href="{{ route('products.create') }}">اضافه کردن محصول جدید</a>

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

            <th>#</th>

            <th>نام</th>

            <th>قیمت</th>

            <th width="280px">اقدامات</th>

        </tr>

        @hasanyrole('Admin')
        @foreach ($products as $product)

	    <tr>

	        <td>{{ ++$i }}</td>

	        <td>{{ $product->name }}</td>

	        <td>{{ $product->price }}</td>

	        <td>

                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">نمایش</a>

                    @can('product-edit')

                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">ویرایش</a>

                    @endcan


                    @csrf

                    @method('DELETE')

                    @can('product-delete')

                    <button type="submit" class="btn btn-danger">حذف</button>

                    @endcan

                </form>

	        </td>

	    </tr>

	    @endforeach
        @endrole
	    @hasanyrole('supplier')
        @foreach ($products_of_seller as $product)

	    <tr>

	        <td>{{ ++$i }}</td>

	        <td>{{ $product->name }}</td>

	        <td>{{ $product->price }}</td>

	        <td>

                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">نمایش</a>

                    @can('product-edit')

                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">ویرایش</a>

                    @endcan


                    @csrf

                    @method('DELETE')

                    @can('product-delete')

                    <button type="submit" class="btn btn-danger">حذف</button>

                    @endcan

                </form>

	        </td>

	    </tr>

	    @endforeach
        @endrole

    </table>


    {!! $products->links() !!}


@endsection