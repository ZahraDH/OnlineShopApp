@extends('admin.dashboard')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <h2>نمایش دسته بندی</h2>

            </div>

            <div class="pull-left">

                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>

            </div>

        </div>

    </div>


    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form action="{{ route('categories.update',$category->id) }}" method="POST">

    	@csrf

        @method('PUT')


         <div class="row">

		    <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>دسته بندی پدر:</strong>

		            <input type="text" name="parent_id" value="{{ $category->parent_id }}" class="form-control" placeholder="دسته بندی پدر">

		        </div>

		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>نام دسته بندی:</strong>

		            <textarea class="form-control" style="height:150px" name="category_name" placeholder="نام دسته بندی">{{ $category->category_name }}</textarea>

		        </div>

		    </div>

		    <!--<div class="col-xs-12 col-sm-12 col-md-12 text-center">

		      <button type="submit" class="btn btn-primary">Submit</button>

		    </div>-->

		</div>


    </form>


<p class="text-center text-primary"><small></small></p>

@endsection