@extends('admin.dashboard')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <h2>تصاویر</h2>

            </div>

            <div class="pull-left">

                @can('image-create')

                <a class="btn btn-success" href="{{ route('upload-image.create') }}">اضافه کردن تصویر جدید</a>

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

            <th>نام محصول</th>

            <th>تصویر</th>

            <th width="280px">اقدامات</th>

        </tr>

        @hasanyrole('Admin')
        @foreach ($images as $image)

	    <tr>

	        <td>{{ ++$i }}</td>

	        <td>{{ $image->product->name }}</td>

            <td>
                <img src="{{asset($image->getFirstMediaUrl('images') )}}" alt="" style="width: 100px">
            </td>


	        <td>

                <form action="{{ route('upload-image.destroy',$image->id) }}" method="POST" enctype="multipart/form-data">

                    <a class="btn btn-info" href="{{ route('upload-image.show',$image->id) }}">نمایش</a>

                    @can('image-edit')

                    <a class="btn btn-primary" href="{{ route('upload-image.edit',$image->id) }}">ویرایش</a>

                    @endcan


                    @csrf

                    @method('DELETE')

                    @can('image-delete')

                    <button type="submit" class="btn btn-danger">حذف</button>

                    @endcan

                </form>

	        </td>

	    </tr>

	    @endforeach
        @endrole
	    @hasanyrole('supplier')
        @foreach ($images as $image)

	    @if ($image->product->brand_id == Auth::user()->brand_id)
        <tr>

	        <td>{{ ++$i }}</td>

	        <td>{{ $image->product->name }}</td>

	        <td>
                <img src="{{asset($image->getFirstMediaUrl('images') )}}" alt="" style="width: 100px">
            </td>

	        <td>

                <form action="{{ route('upload-image.destroy',$image->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('upload-image.show',$image->id) }}">نمایش</a>

                    @can('image-edit')

                    <a class="btn btn-primary" href="{{ route('upload-image.edit',$image->id) }}">ویرایش</a>

                    @endcan


                    @csrf

                    @method('DELETE')

                    @can('image-delete')

                    <button type="submit" class="btn btn-danger">حذف</button>

                    @endcan

                </form>

	        </td>

	    </tr>
        @endif

	    @endforeach
        @endrole

    </table>


    {!! $images->links() !!}



@endsection