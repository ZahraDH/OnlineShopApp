@extends('admin.dashboard')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <h2>اضافه کردن تصویر جدید</h2>

            </div>

            <div class="pull-left">

                <a class="btn btn-primary" href="{{ route('upload-image.index') }}">بازگشت به صفحه قبل</a>

            </div>

        </div>

    </div>


    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong>اطلاعات وارد شده نادرست می باشد .<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form action="{{ route('upload-image.store') }}" method="POST" enctype="multipart/form-data">

    	@csrf


         <div class="row">

		    <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>شناسه محصول:</strong>

		            <input type="text" name="product_sku" class="form-control" placeholder="شناسه محصول را وارد کنید">

		        </div>

		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong> تصویر:</strong>

					<input type="file" name="image"  id="image" class="form-control" placeholder="تصویر محصول را انتخاب کنید">

		        </div>

		    </div>
   

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

		            <button type="submit" class="btn btn-primary">تایید</button>

		    </div>

		</div>


    </form>

@endsection