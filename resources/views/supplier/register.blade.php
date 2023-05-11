<!DOCTYPE html>
<html lang="en">

<head>
@include('../includes/head')
</head>

<body>



<section class="user-form-part">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-5">
                <div class="user-form-card">
                    <div class="user-form-title">
                        <h2>ایجاد حساب کاربر</h2>
                    </div>
                    {!! Form::open(array('route' => 'store-seller','method'=>'POST','class'=>'user_form')) !!}
                        <div class="form-group">
                            <label for="name">نام کاربری</label>
                            {!! Form::text('name', null, array('placeholder' => 'نام کاربری خود را وارد کنید ','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                            <label for="email">پست الکترونیک</label>
                            {!! Form::text('email', null, array('placeholder' => 'ایمیل کاربر را وارد کنید','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                            <label for="first_name">نام</label>
                            {!! Form::text('first_name', null, array('placeholder' => 'نام کاربر را وارد کنید ','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                            <label for="last_name">نام خانوادگی</label>
                            {!! Form::text('last_name', null, array('placeholder' => 'نام خانوادگی کاربر را وارد کنید ','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                            <label for="password">کلمه عبور</label>
                            {!! Form::password('password', array('placeholder' => 'رمز عبور کاربر را وارد کنید','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">تایید کلمه عبور</label>   
                            {!! Form::password('confirm-password', array('placeholder' => 'رمز عبور کاربر را تایید کنید','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group" style="display: none">
                            <label for="roles">نقش فروشنده</label>   
                            {!! Form::text('roles', $roles->name, array('placeholder' => 'ایمیل کاربر را وارد کنید','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group" style="display: none">
                            <label for="status">وضعیت کاربر</label>
                            {!! Form::text('status','1', array('placeholder' => 'ایمیل کاربر را وارد کنید','class' => 'form-control')) !!}
                        </div>
                        <div class="form-button">
                            <button type="submit">ایجاد حساب کاربری</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{!! Form::close() !!}
@include('../includes/script')
</body>
</html>
