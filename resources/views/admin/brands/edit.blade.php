@extends('admin.dashboard')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <h2>ویرایش فروشنده</h2>

            </div>

            <div class="pull-left">

                <a class="btn btn-primary" href="{{ route('brands.index') }}"> بازگشت به صفحه قبل</a>

            </div>

        </div>

    </div>


    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong> اطلاعات شما نادرست می باشد .<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form action="{{ route('brands.update',$brand->id) }}" method="POST">

    	@csrf

        @method('PUT')


         <div class="row">

		    <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong> وضعیت فروشنده:</strong>

		            <select name="status" id="status">
                        <option value="1">تایید</option>
                        <option value="2">رد</option>
                    </select>

		        </div>

		    </div>


		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

		      <button type="submit" class="btn btn-primary">تایید</button>

		    </div>

		</div>


    </form>


@endsection