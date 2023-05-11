@extends('admin.dashboard')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <h2>اضافه کردن دسته بندی جدید</h2>

            </div>

            <div class="pull-left">

                <a class="btn btn-primary" href="{{ route('categories.index') }}"> بازگشت به صفحه قبل</a>

            </div>

        </div>

    </div>


    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong>اطلاعات شما نادرست می باشد .<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form action="{{ route('categories.store') }}" method="POST">

    	@csrf


         <div class="row">

		    <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong> دسته بندی پدر :</strong>

                    <select name="parent_id" id="parent_id">
                        <option value="">null</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>

		        </div>

		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong> نام دسته بندی :</strong>

		            <textarea class="form-control" style="height:150px" name="category_name" placeholder="نام دسته بندی را وارد کنید"></textarea>

		        </div>

		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

		            <button type="submit" class="btn btn-primary">تایید</button>

		    </div>

		</div>


    </form>


@endsection