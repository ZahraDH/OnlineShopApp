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
                            <h2>بازیابی رمز عبور</h2>
                        </div>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form class="user-form" action="{{route('password.email')}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="email">ایمیل</label>
                                <input id="email" type="email"
                                    class="form-control  @error('email') is-invalid @enderror" name="email"
                                    placeholder="ایمیل خود را وارد کنید" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-button">
                                <button type="submit">ارسال لینک بازیابی رمز عبور</button>
                                <p>حساب ندارید؟ <a href="register">ثبت نام.</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('../includes/script')

</body>

</html>