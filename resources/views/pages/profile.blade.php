@extends('layouts.app')

@section('content')

@include('../includes/single-banner-nuts',['title'=>'مشخصات','linkTiltle'=>'مشخصات'])

<section class="inner-section profile-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if ($message = Session::get('success'))

                <div class="alert alert-success">

                <p>{{ $message }}</p>

                </div>

                @endif
                <div class="account-card">
                    <div class="account-title">
                        <h4>مشخصات شما</h4>
                        <a href="{{route('change')}}" class="btn">تغییر رمز عبور</a>
                    </div>
                    <form action="{{route('updateProfile.update',Auth::user()->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="account-content">
                            <div class="row">
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" for="name">نام نمایشی</label>
                                        <input class="form-control" type="text" name="name"
                                            value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" for="email">پست الکترونیک</label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{Auth::user()->email}}">

                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" for="first_name">نام</label>
                                        <input class="form-control" type="text" name="first_name"
                                            value="{{Auth::user()->first_name}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" for="last_name">نام خانوادگی</label>
                                        <input class="form-control" type="text" name="last_name"
                                            value="{{Auth::user()->last_name}}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <!-- <div class="profile-btn"><a href="reset"><i class="fal fa-pen"></i> رمز عبور را تغییر دهید</a></div>-->
                                    <button class="form-btn profile-btn" type="submit">اطلاعات حساب خود را ذخیره
                                        کنید</button>
                                </div>
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