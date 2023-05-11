<!DOCTYPE html>
<html lang="en">

<head>
@include('../includes/head')
</head>

<body>


<section class="user-form-part">
    <div class="container">
        <div class="row justify-content-center al">
            <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-5" style="margin-top: 60px ">
                <div class="user-form-card">
                    <div class="user-form-title">
                        <h2>ورود به حساب کاربری</h2>
                    </div>
                    <form class="user-form" action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">پست الکترونیک</label>
                            <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="ایمیل خود را وارد کنید" value="{{old('email')}}" required autocomplete="current-password">
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">کلمه عبور</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="رمز ورود خود را وارد کنید" >
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                        </div>
                       <div class="row mb-3">
                           <!-- <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('مرا به خاطر بسپار') }}
                                    </label>
                                </div>
                            </div>-->
                            <div class="col-12 text-end">
                                @if (Route::has('password.request'))
                                    <a class="forgot-pass" href="{{ route('password.request') }}">
                                        {{ __('رمز عبور خود را فراموش کرده اید؟') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="form-button">
                            <button type="submit">ورود</button>
                            <p>حساب ندارید؟ <a href="register">ثبت نام.</a></p>
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

