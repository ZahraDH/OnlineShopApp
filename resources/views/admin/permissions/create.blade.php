@extends('admin.dashboard')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <h2>اضافه کردن محصول جدید</h2>

            </div>

            <div class="pull-left">

                <a class="btn btn-primary" href="{{ route('permission.index') }}"> Back</a>

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


    <form action="{{ route('permission.store') }}" method="POST">

    	@csrf


         <div class="row">

		    <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>نام:</strong>

		            <input type="text" name="name" class="form-control" placeholder="نام دسترسی را وارد کنید">

		        </div>

		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>نام گارد را وارد کنید :</strong>

					<input type="text" name="guard_name" class="form-control" placeholder="دسته بندی محصول را وارد کنید">

		        </div>

		    </div>


		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

		            <button type="submit" class="btn btn-primary">تایید</button>

		    </div>

		</div>


    </form>


<p class="text-center text-primary"><small></small></p>

@endsection