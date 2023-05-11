@extends('layouts.app')

@section('content')

@include('../includes/single-banner-nuts',['title'=>'جزئیات آدرس','linkTiltle'=>'جزئیات آدرس'])

<section class="inner-section profile-part">
    <div class="container">
        <div class="row">
            @foreach ($addresses as $address)
            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <h4>آدرس صورتحساب </h4>
                        <form action="{{route('addresses.destroy',$address->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-inline btn-navbar"> <i
                                    class="fal fa-map-marker-alt"></i>حذف کردن آدرس</button>
                        </form>
                    </div>
                    <form action="{{route('addresses.update',$address->id)}}" method="POST">
                        @csrf
                        @method('PUT')
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
                                            value=" @if (isset($address->city)){{$address->city}}@endif">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 alert fade show">
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
                                    <button class="form-btn profile-btn" type="submit">ویرایش آدرس</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


@endsection