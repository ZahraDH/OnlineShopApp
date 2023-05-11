@extends('admin.dashboard')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <h2>دسته بندی ها</h2>

            </div>

            <div class="pull-left">

                @can('category-create')

                <a class="btn btn-success" href="{{ route('categories.create') }}">اضافه کردن دسته بندی جدید</a>

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

            <th>دسته بندی پدر</th>

            <th>نام دسته بندی </th>

            <th width="280px">اقدامات</th>

        </tr>

	    @foreach ($categories as $category)
        @php
            $parentName = "";
            foreach ($categories as $ordination){ 
                if ($category->parent_id == $ordination->id){ 
                    $parentName =  $ordination->category_name ;
                    dd($parentName);
                } 
            }
            
        @endphp
	    <tr>

	        <td>{{ ++$i }}</td>

	        <td>@if(isset($parentName))  {{$parentName}} @else null @endif</td>

	        <td>{{ $category->category_name}}</td>

	        <td>

                <form action="{{ route('categories.destroy',$category->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">نمایش</a>

                    @can('category-edit')

                    <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">ویرایش</a>

                    @endcan


                    @csrf

                    @method('DELETE')

                    @can('category-delete')

                    <button type="submit" class="btn btn-danger">حذف</button>

                    @endcan

                </form>

	        </td>

	    </tr>

	    @endforeach

    </table>


    {!! $categories->links() !!}


<p class="text-center text-primary"><small></small></p>

@endsection