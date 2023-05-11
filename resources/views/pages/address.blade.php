@extends('layouts.app')

@section('content')

@include('../includes/single-banner-nuts',['title'=>'آدرس ها','linkTiltle'=>'آدرس ها'])

<section class="inner-section orderlist-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="orderlist">
                    <div class="orderlist-title">
                        <a href="{{route('addresses.create')}}" class="btn btn-inline btn-navbar btn-address"> <i
                                class="fal fa-map-marker-alt"></i> اضافه کردن آدرس</a>
                    </div>
                    <div class="orderlist-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-scroll p-0">
                                    @if ($addresses == null)
                                        <p>برای این کاربر هنوز آدرسی ثبت نشده است .</p>
                                    @else
                                    <table class="table-list">
                                        <thead>
                                            <tr>
                                                <th scope="col">شماره آدرس</th>
                                                <th scope="col">نام شهر</th>
                                                <th scope="col">آدرس</th>
                                                <th scope="col">کد پستی</th>
                                                <th scope="col">مشاهده کامل</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $i=0;
                                            @endphp
                                            @foreach ($addresses as $address)
                                            <tr>
                                                <td class="table-name">
                                                    <h6>#{{++$i}}</h6>
                                                </td>
                                                <td class="table-name">
                                                    <h6>{{$address->city}}</h6>
                                                </td>
                                                <td class="table-price">
                                                    <h6>{{$address->address}}</h6>
                                                </td>
                                                <td class="table-brand">
                                                    <h6>{{$address->post_code}}</h6>
                                                </td>
                                                <td class="table-action">
                                                    <a class="view" href="{{route('addresses.show',$address->id)}}"
                                                        title="جزئیات سفارش"><i class="far fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection