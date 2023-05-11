@extends('admin.dashboard')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <h2>اضافه کردن محصول جدید</h2>

            </div>

            <div class="pull-left">

                <a class="btn btn-primary" href="{{ route('products.index') }}">بازگشت به صفحه قبل</a>

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


    <form action="{{ route('products.store') }}" method="POST">

    	@csrf


         <div class="row">

		    <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>نام:</strong>

		            <input type="text" name="name" class="form-control" placeholder="نام محصول را وارد کنید">

		        </div>

		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>دسته بندی محصول:</strong>

					<select name="category_id" id="category_id">
                        <option value="">null</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>

		        </div>

		    </div>

			<div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>شناسه محصول:</strong>

					<input type="text" name="sku" class="form-control" placeholder="شناسه محصول را وارد کنید">

		        </div>

		    </div>


			<div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>وزن محصول:</strong>

					<input type="text" name="weight" class="form-control" placeholder="وزن محصول را وارد کنید">

		        </div>

		    </div>

			<div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>برند محصول:</strong>

					<input type="text" name="brand" class="form-control" placeholder="برند محصول را وارد کنید">

		        </div>

		    </div>


            <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>توضیحات :</strong>

					<textarea class="form-control"  name="description" style="height:150px"  placeholder="توضیحات مربوط به محصول را وارد کنید"></textarea>

		        </div>

		    </div>

			<div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>تعداد محصول:</strong>

					<input type="text" name="quantity" class="form-control" placeholder="تعداد محصول را وارد کنید">

		        </div>

		    </div>


            <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>قیمت :</strong>

		            <input type="text" name="price" class="form-control" placeholder="قیمت محصول را وارد کنید">

		        </div>

		    </div>

			<div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>تخفیف محصول:</strong>

					<input type="text" name="discount" class="form-control" placeholder="تخفیف محصول را وارد کنید">

		        </div>

		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12" style="display: none">

		        <div class="form-group">

		            <strong>فروشنده:</strong>

		            <input type="text" name="user_id" class="form-control" placeholder="ایمیل فروشنده را وارد کنید" value="{{Auth::user()->id}}">

		        </div>

		    </div>

			<div class="col-xs-12 col-sm-12 col-md-12" >

		        <div class="form-group" style="display: none">

		            <strong>برند :</strong>

		            <input type="text" name="brand_id" class="form-control" placeholder="نام فروشگاه را وارد کنید" value="{{$brand->id}}">

		        </div>

		    </div>
		   

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

		            <button type="submit" class="btn btn-primary">تایید</button>

		    </div>

		</div>


    </form>

@endsection