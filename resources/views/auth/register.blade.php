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
                        <h2>ایجاد حساب</h2>
                    </div>
                    <form class="user-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">نام</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="نام خود را وارد کنید" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">پست الکترونیک</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="ایمیل خود را وارد کنید" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">کلمه عبور</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="رمز عبور خود را وارد کنید" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">تایید کلمه عبور</label>   
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="کلمه عبور خود را دوباره وارد کنید" required autocomplete="new-password">
                        </div>
                        <div class="form-button">
                            <button type="submit">ایجاد حساب کاربری</button>
                            <p>قبلاً حساب دارید؟ <a href="login">ورود.</a></p>
                        </div>
                    </form>
                </div>
                <div class="user-form-footer">
                </div>
            </div>
        </div>
    </div>
</section>


@include('../includes/script')
</body>
</html>
