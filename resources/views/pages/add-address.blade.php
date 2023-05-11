@extends('layouts.app')

@section('content')

@include('../includes/single-banner-nuts',['title'=>'ثبت آدرس','linkTiltle'=>'ثبت آدرس'])

<section class="inner-section profile-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <h4>ثبت آدرس</h4>
                    </div>
                    <form action="{{route('addresses.store',Auth::user()->id)}}" method="POST">
                        @csrf
                        <div class="account-content">
                            <div class="row">
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="form-group">
                                        <label class="form-label" for="email">نام </label>
                                        <input class="form-control" type="text" name="email"
                                            value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="form-group">
                                        <label class="form-label" for="city">نام شهر</label>
                                        <input class="form-control" type="text" name="city"
                                            placeholder="نام شهر را وارد کنید ...">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="form-group">
                                        <label class="form-label" for="address">آدرس</label>
                                        <input class="form-control" type="text" name="address"
                                            placeholder="آدرس را وارد کنید ...">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="form-group">
                                        <label class="form-label" for="post_code">کد پستی</label>
                                        <input class="form-control" type="text" name="post_code"
                                            placeholder="کد پستی را وارد کنید ...">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="form-group">
                                        <label class="form-label" for="credit_card">کارت اعتباری</label>
                                        <input class="form-control" type="text" name="credit_card"
                                            placeholder=" کارت اعتباری خود را وارد کنید"></input>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="form-group">
                                        <label class="form-label" for="phone_number">شماره تماس</label>
                                        <input class="form-control" type="text" name="phone_number"
                                            placeholder="شماره تماس خود را وارد کنید ...">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button class="form-btn profile-btn" type="submit"> آدرس خود را ثبت کنید</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection