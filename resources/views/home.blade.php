@extends('layouts.app')

@section('content')
<section class="home-classic-slider slider-arrow top-section-banner">
    <div class="banner-part banner-1 top-banner">
        <div class="container">
            <div class="row rtl">
                <div class="col-md-8 col-lg-6 ">
                </div>
            </div>
        </div>
    </div>
    <div class="banner-part banner-2 top-banner">
        <div class="container">
            <div class="row rtl">
                <div class="col-md-8 col-lg-6">
                </div>
            </div>
        </div>
    </div>
    <div class="banner-part banner-3 top-banner">
        <div class="container">
            <div class="row rtl">
                <div class="col-md-8 col-lg-6">
                </div>
            </div>
        </div>
    </div>
</section>





<section class="section recent-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>موارد پرطرفدار</h2>
                </div>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            @foreach ($orderItems as $orderItem)
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <a class="product-image" href="{{url('product-details/'.$orderItem->id)}}"><img
                                src="@if($orderItem->showImagePath()->first() != null ) {{$orderItem->showImagePath()->first()->getFirstMediaUrl('images')}} @endif"
                                alt="تولید - محصول"></a>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a
                                href="{{url('product-details/'.$orderItem->id)}}">{{$orderItem->name}}</a></h6>
                        <div class="product-price">
                            <div>{{$orderItem->price}} تومان</div>
                            <a class="product-add" title="افزودن به سبد خرید"
                                href="{{ route('product-details', $orderItem->id) }}"><i
                                    class="far fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="section-btn-25">
                    <a href="{{route('shop-grid')}}" class="btn btn-inline"> <span> بیشتر ببینید </span> <i
                            class="far fa-long-arrow-left float-end ms-1"></i> </a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section promo-part">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 px-xl-3">
                <div class="promo-img">
                    <a href="{{route('shop-grid')}}"><img src="assets/img/banner/4.jpg" alt="تبلیغاتی"></a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 px-xl-3">
                <div class="promo-img">
                    <a href="{{route('shop-grid')}}"><img src="assets/img/banner/5.jpg" alt="تبلیغاتی"></a>
                </div>
            </div>
        </div>
    </div>
</div>



<section class="section recent-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>تخفیف های مزبار</h2>
                </div>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            @foreach ($discountproducts as $discountproduct)
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <a class="product-image" href="{{url('product-details/'.$discountproduct->id)}}"><img
                                src="@if($discountproduct->showImagePath()->first() != null ) {{$discountproduct->showImagePath()->first()->getFirstMediaUrl('images')}} @endif"
                                alt="تولید - محصول"></a>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a
                                href="{{url('product-details/'.$discountproduct->id)}}">{{$discountproduct->name}}</a>
                        </h6>
                        <div class="product-price">
                            <div class="product-discount">
                                <del>{{$discountproduct->price}}
                                    تومان</del><span>{{(($discountproduct->price)-(($discountproduct->price) *
                                    $discountproduct->discount)/100)}} تومان </span>
                            </div>
                            <a class="product-add" title="افزودن به سبد خرید"
                                href="{{ route('product-details', $discountproduct->id) }}"><i
                                    class="far fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="section-btn-25">
                    <a href="shop-grid" class="btn btn-inline"> <span> بیشتر ببینید </span> <i
                            class="far fa-long-arrow-left float-end ms-1"></i> </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section suggest-part">
    <div class="container">
        <ul class="suggest-slider ">
            <li>
                <a class="suggest-card" href="{{route('get-Category-parent',2)}}">
                    <img src="{{asset('assets/img/suggest/02.jpg')}}" alt="پیشنهاد می دهد">
                    <h5>ترشیجات</h5>
                </a>
            </li>
            <li>
            <a class="suggest-card" href="{{route('get-Category-parent',4)}}">
                <img src="{{asset('assets/img/suggest/04.jpg')}}" alt="پیشنهاد می دهد">
                <h5>خشکبار</h5>
            </a>
            </li>
            <li>
                <a class="suggest-card" href="{{route('get-Category-parent',1)}}">
                    <img src="{{asset('assets/img/suggest/03.jpg')}}" alt="پیشنهاد می دهد">
                    <h5>خیارشور</h5>
                </a>
                </li>
            <li>
            <a class="suggest-card" href="{{route('get-Category-parent',5)}}">
                <img src="{{'assets/img/suggest/05.jpg'}}" alt="پیشنهاد می دهد">
                <h5>آجیل ها</h5>
            </a>
            </li>
            <li>
                <a class="suggest-card" href="{{route('get-Category-parent',3)}}">
                    <img src="{{asset('assets/img/suggest/01.jpg')}}" alt="پیشنهاد می دهد">
                    <h5>شوریجات</h5>
                </a>
            </li>
        </ul>
    </div>
</section>

<section class="section newitem-part">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-heading">
                    <h2> تازه رسیده ها</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <ul class="new-slider slider-arrow">
                    @foreach ($newproducts as $newproduct)
                    <li>
                        <div class="product-card">
                            <div class="product-media">
                                <a class="product-image" href="{{url('product-details/'.$newproduct->id)}}"><img
                                        src="@if($newproduct->showImagePath()->first() != null ) {{$newproduct->showImagePath()->first()->getFirstMediaUrl('images')}} @endif"
                                        alt="تولید - محصول"></a>
                            </div>
                            <div class="product-content">
                                <h6 class="product-name"><a
                                        href="{{url('product-details/'.$newproduct->id)}}">{{$newproduct->name}}</a>
                                </h6>
                                <div class="product-price">
                                    <div>{{$newproduct->price}} تومان</div>
                                    <a class="product-add" title="افزودن به سبد خرید"
                                        href="{{ route('product-details', $newproduct->id) }}"><i
                                            class="far fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>



@endsection