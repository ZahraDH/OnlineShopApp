@extends('admin.dashboard')


@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-right">

            <h2>ویرایش نقش</h2>

        </div>

        <div class="pull-left">

            <a class="btn btn-primary" href="{{ route('roles.index') }}"> بازگشت به صفحه قبل</a>

        </div>

    </div>

</div>


@if (count($errors) > 0)

    <div class="alert alert-danger">

        <strong>Whoops!</strong>اطلاعات وارد شده نادرست می باشد .<br><br>

        <ul>

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

        </ul>

    </div>

@endif


{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>نام:</strong>

            {!! Form::text('name', null, array('placeholder' => 'نام را وارد کنید ...','class' => 'form-control')) !!}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>سطوح دسترسی را مشخص کنید :</strong>

            <br/>

            @foreach($permission as $value)

                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}

                {{ $value->name }}</label>

            <br/>

            @endforeach

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

        <button type="submit" class="btn btn-primary">ثبت</button>

    </div>

</div>

{!! Form::close() !!}


@endsection
