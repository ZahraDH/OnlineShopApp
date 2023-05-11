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
                        <h2>ایجاد کمپانی !</h2>
                    </div>
                    <form class="user-form" method="POST" action="{{ route('brands.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="brand_name">نام تجاری</label>
                            <input id="brand_name" type="text" class="form-control @error('brand_name') is-invalid @enderror" placeholder="نام تجاری خود را وارد کنید" name="brand_name" value="{{ old('brand_name') }}" required autocomplete="brand_name" autofocus>
                                @error('brand_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="trade_id">شماره صنفی</label>
                            <input id="trade_id" type="text" class="form-control @error('trade_id') is-invalid @enderror" name="trade_id" placeholder="شماره صنفی خود را وارد کنید" value="{{ old('trade_id') }}" required autocomplete="trade_id">

                            @error('trade_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="national_number">شماره ملی</label>
                            <input id="national_number" type="text" class="form-control @error('national_number') is-invalid @enderror" name="national_number" placeholder="شماره ملی خود را وارد کنید" value="{{ old('national_number') }}" required autocomplete="national_number">

                            @error('national_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="city">نام شهرستان</label>
                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" placeholder=" نام شهرستان خود را وارد کنید" value="{{ old('city') }}" required autocomplete="city">

                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">آدرس</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder=" آدرس خود را وارد کنید" value="{{ old('address') }}" required autocomplete="address">

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number">شماره تماس</label>
                            <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="شماره تماس خود را وارد کنید" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="post_code">کد پستی </label>
                            <input id="post_code" type="text" class="form-control @error('post_code') is-invalid @enderror" name="post_code" placeholder=" کد پستی خود را وارد کنید" value="{{ old('post_code') }}" required autocomplete="post_code">

                            @error('post_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">ایمیل</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder=" ایمیل خود را وارد کنید" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-button">
                            <button type="submit">ایجاد کمپانی</button>
                            <p>قبلاً کمپانی دارید؟ <a href="{{route('show-update-sellers')}}">ورود.</a></p>
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
