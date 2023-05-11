@extends('layouts.app')

@section('content')

@include('../includes/single-banner-nuts',['title'=>'فاکتور سفارش','linkTiltle'=>'فاکتور سفارش'])
<section class="inner-section invoice-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <h4>جزئیات سفارش</h4>
                    </div>
                    <div class="account-content">
                        <ul class="invoice-details">
                            <li>
                                <h6>کد پیگیری سفارش</h6>
                                <p>@if (isset($paymentId->payment_id))
                                    {{$paymentId->payment_id}} @else سفارش شما ناموفق بوده است .
                                @endif</p>
                            </li>
                            <li>
                                <h6>تاریخ ثبت سفارش</h6>
                                <p>{{date('Y-m-d', strtotime($order->created_at))}}</p>
                            </li>
                            <li>
                                <h6>تحویل گیرنده</h6>
                                <p>{{$order->user->name}}</p>
                            </li>
                            <li>
                                <h6>آدرس</h6>
                                <p> @if(isset($shippingInfo->userAddresses->address)) {{$shippingInfo->userAddresses->address}} @endif
                                </p>
                            </li>
                            <li>
                                <h6>شماره موبایل</h6>
                                <p> @if(isset($shippingInfo->userAddresses->phone_number)){{$shippingInfo->userAddresses->phone_number}} @endif
                                </p>
                            </li>
                            <li>
                                <h6>مبلغ</h6>
                                <p>{{$order->total_amount}} تومان</p>
                            </li>
                            <li>
                                <h6>میزان تخفیف</h6>
                                <p>{{$total_discount}} تومان</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @if ($order->status != 0)
            <div class="col-lg-12">
                <div class="table-scroll">
                    <table class="table-list">
                        <thead>
                            <tr>
                                <th scope="col">نام</th>
                                <th scope="col">قیمت هر محصول</th>
                                <th scope="col">تخفیف اعمال شده </th>
                                <th scope="col">زیر کل</th>
                                <th scope="col">وضعیت تحویل</th>
                                <th scope="col">تعداد</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderItems as $orderItem)
                            <tr>
                                <td class="table-name">
                                    <h6>{{$orderItem->product->name}}</h6>
                                </td>
                                <td class="table-price">
                                    <h6>{{$orderItem->price}} تومان </h6>
                                </td>
                                <td class="table-price">
                                    <h6>{{(($orderItem->discount * $orderItem->price) / 100) * $orderItem->quantity}} تومان </h6>
                                </td>
                                <td class="table-price">
                                    <h6>{{$orderItem->subtotal}} تومان </h6>
                                </td>
                                <td class="table-brand">
                                    <h6>
                                        @if ($shippingInfo->status == 'preparing')
                                        <h6 class="badge bg-primary">در حال آماده سازی</h6>
                                        @else
                                        <h6 class="badge bg-success">تحویل داده شد</h6>
                                        @endif
                                    </h6>
                                </td>
                                <td class="table-quantity">
                                    <h6>{{$orderItem->quantity}}</h6>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

@endsection