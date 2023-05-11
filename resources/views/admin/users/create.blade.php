@extends('admin.dashboard')


@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-right">

            <h2>افزودن کاربر جدید</h2>

        </div>

        <div class="pull-left">

            <a class="btn btn-primary" href="{{ route('users.index') }}"> بازگشت به صفحه قبل</a>

        </div>

    </div>

</div>


@if (count($errors) > 0)

  <div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

       @foreach ($errors->all() as $error)

         <li>{{ $error }}</li>

       @endforeach

    </ul>

  </div>

@endif



{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>نام:</strong>

            {!! Form::text('name', null, array('placeholder' => 'نام کاربر را وارد کنید ...','class' => 'form-control')) !!}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>ایمیل:</strong>

            {!! Form::text('email', null, array('placeholder' => 'ایمیل کاربر را وارد کنید ...','class' => 'form-control')) !!}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>رمز عبور :</strong>

            {!! Form::password('password', array('placeholder' => 'رمز عبور کاربر را وارد کنید ...','class' => 'form-control')) !!}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>تایید رمز عبور :</strong>

            {!! Form::password('confirm-password', array('placeholder' => 'رمز عبور کاربر را تایید کنید ...','class' => 'form-control')) !!}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>سطح دسترسی:</strong>

            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

        <button type="submit" class="btn btn-primary">ثبت</button>

    </div>

</div>

{!! Form::close() !!}


@endsection