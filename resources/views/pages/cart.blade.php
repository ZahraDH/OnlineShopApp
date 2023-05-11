@extends('layouts.app')

@section('content')

@include('../includes/single-banner-nuts',['title'=>'سبد خرید','linkTiltle'=>'سبد خرید'])

<section class="inner-section checkout-part">
    <div class="container">
        <div class="row">
            @if (session('cart'))
            <div class="col-lg-8">
                <div class="account-card">
                    <div class="account-title">
                        <h4>سفارش شما</h4>
                    </div>
                    <div class="account-content">
                        <div class="table-scroll">
                            <table class="table-list">
                                <thead>
                                    <tr>
                                        <th scope="col">نام</th>
                                        <th scope="col">قیمت</th>
                                        <th scope="col">تخفیف این محصول</th>
                                        <th scope="col">تعداد</th>
                                        <th scope="col">عمل</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0;
                                    $totalDiscount = 0;
                                    $arr = array();
                                    $array = array();
                                    $i = 0; @endphp
                                    @foreach(session('cart') as $id => $details)
                                    @php $total += $details['price']; $totalDiscount += $details['discount'];  @endphp
                                    <tr data-id="{{ $id }}">
                                        <td class="table-name">
                                            <h6>{{ $details['name'] }} </h6>
                                        </td>
                                        <td class="table-price">
                                            <h6>{{ $details['price'] }} تومان </h6>
                                        </td>
                                        <td class="table-price">
                                            <h6>{{ $details['discount'] }} تومان </h6>    
                                        </td>
                                        <td>
                                            <h6> {{ $details['quantity'] }}</h6>   
                                        </td>
                                        <td class="table-action">
                                            <a class="view " href="{{route('product-details',$id)}}"
                                                title="مشاهده محصول"><i class="far fa-eye"></i></a>
                                            <a class="trash remove-from-cart" href="#"
                                                title="لیست خواسته ها را حذف کنید"><i class="far fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @php
                                    $array[$i] = $details['quantity'];
                                    $arr[$i] = $id;
                                    $i++;
                                    @endphp
                                    @endforeach
                                    @php $i =0; @endphp
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="account-card">
                    @php $serialize = implode(",",$arr); $quantity = implode(",",$array); $totalAmount = $total - $totalDiscount; @endphp
                    <div class="checkout-charge">
                        <div class="account-title">
                            <h4>خلاصه سفارش</h4>
                        </div>
                        <ul>
                            <li><span> قیمت کل بدون تخفیف </span><span>{{ $total }}تومان</span></li>
                            <li><span>سود شما از این خرید</span><span>{{$totalDiscount}}تومان</span></li>
                            <li>
                                <span>کل </span><span>{{ $totalAmount }} تومان</span>
                            </li>
                        </ul>
                    </div>

                    <div class="checkout-proced"><a href="checkout/{{$serialize}}/{{$quantity}}/{{$totalAmount}}"
                            class="btn btn-inline">ادامه پرداخت</a></div>
                </div>
            </div>
            @else
            <div class="not-found">
                <p>هیچ محصولی در سبد خرید شما وجود ندارد .</p>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection