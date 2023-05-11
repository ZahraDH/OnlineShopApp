@extends('admin.dashboard')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <h2>ویرایش مجوز</h2>

            </div>

            <div class="pull-left">

                <a class="btn btn-primary" href="{{ route('permission.index') }}"> بازگشت به صفحه قبل</a>

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


    <form action="{{ route('permission.update',$permission->id) }}" method="POST">

    	@csrf

        @method('PUT')


         <div class="row">

		    <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>نام:</strong>

		            <input type="text" name="name" value="{{ $permission->name }}" class="form-control" placeholder="نام محصول را وارد کنید">

		        </div>

		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>دسته بندی محصول:</strong>

		            <input type="text" name="guard_name" value="{{ $permission->guard_name }}" class="form-control" placeholder="دسته بندی محصول را وارد کنید">

		        </div>

		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">تایید</button>

        </div>


    </form>



@endsection