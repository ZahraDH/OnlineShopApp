@extends('layouts.app')

@section('content')

@include('../includes/single-banner-nuts',['title'=>'پرداخت','linkTiltle'=>'پرداخت'])

<section class="inner-section checkout-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <h4>آدرس صورتحساب </h4>
                        <a href="{{route('addresses.index')}}"> <i class="fal fa-map-marker-alt"></i> ویرایش آدرس</a>
                    </div>
                    @if (isset($address))
                    <form action="{{route('purchase',[$serialize,$quantity,$address->id,$totalAmount])}}" method="POST">
                        @csrf
                        <div class="account-content">
                            <div class="row">
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="form-group">
                                        <label class="form-label" for="first_name">نام </label>
                                        <input class="form-control" type="text" name="first_name"
                                            value="{{Auth::user()->first_name}}" required>

                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="form-group">
                                        <label class="form-label" for="last_name"> نام خانوادگی</label>
                                        <input class="form-control" type="text" name="last_name"
                                            value="{{Auth::user()->last_name}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="form-group">
                                        <label class="form-label" for="city">نام شهر</label>
                                        <input class="form-control" type="text" name="city"
                                            value=" @if (isset($address->city)){{$address->city}}@endif">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 alert fade show">
                                    <div class="form-group">
                                        <label class="form-label" for="address">آدرس</label>
                                        <input class="form-control" type="text" name="address"
                                            value=" @if (isset($address->address)){{$address->address}}@endif">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="form-group">
                                        <label class="form-label" for="post_code">کد پستی</label>
                                        <input class="form-control" type="text" name="post_code"
                                            value=" @if (isset($address->post_code)){{$address->post_code}}@endif">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="form-group">
                                        <label class="form-label" for="credit_card">کارت اعتباری</label>
                                        <input class="form-control" type="text" name="credit_card"
                                            placeholder=" کارت اعتباری خود را وارد کنید"
                                            value=" @if (isset($address->credit_card)){{$address->credit_card}}@endif"></input>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="form-group">
                                        <label class="form-label" for="phone_number">شماره تماس</label>
                                        <input class="form-control" type="text" name="phone_number"
                                            value=" @if (isset($address->phone_number)){{$address->phone_number}}@endif">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button class="form-btn profile-btn" type="submit">ادامه پرداخت</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @else 
                    <p>
                       <span>برای این کاربر آدرسی ثبت نشده است ، برای افزودن آدرس <a href="{{route('addresses.index')}}"> اینجا </a> کلیک کنید . </span>
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection