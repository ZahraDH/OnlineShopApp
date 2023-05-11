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
                        <h2>تایید نهایی</h2>
                    </div>
                    <form class="user-form" method="POST" action="{{ route('update-sellers') }}">
                        @csrf
                        <div class="form-group">
                            <label for="brand_name">نام تجاری</label>
                            <input id="brand_name" type="text" class="form-control @error('brand_name') is-invalid @enderror" placeholder="نام تجاری  را وارد کنید" name="brand_name" value="{{ old('brand_name') }}" required autocomplete="brand_name" autofocus>
                                @error('brand_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="code">کد فروشگاه </label>
                            <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" placeholder="کد فروشگاه  را وارد کنید" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">ایمیل</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder=" ایمیل کاربر را وارد کنید" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-button">
                            <button type="submit">ثبت نهایی</button>
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
