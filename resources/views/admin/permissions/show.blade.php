@extends('admin.dashboard')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <h2> نمایش محصول</h2>

            </div>

            <div class="pull-left">

                <a class="btn btn-primary" href="{{ route('permission.index') }}"> بازگشت به صفحه نخست</a>

            </div>

        </div>

    </div>


    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>نام محصول:</strong>

                {{ $permission->name }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong> دسته بندی محصول:</strong>

                {{ $permission->guard_name }}

            </div>

        </div>

    </div>

@endsection
