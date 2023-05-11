@extends('layouts.app')

@section('content')

@include('../includes/single-banner-nuts',['title'=>'فروشگاه','linkTiltle'=>'فروشگاه'])

<section class="inner-section orderlist-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="orderlist">
                    <div class="orderlist-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-scroll p-0">
                                    <table class="table-list">
                                        <thead>
                                            <tr>
                                                <th scope="col">نام</th>
                                                <th scope="col">شماره صنفی</th>
                                                <th scope="col">نام شهرستان</th>
                                                <th scope="col">آدرس</th>
                                                <th scope="col">کد پستی</th>
                                                <th scope="col">ایمیل</th>
                                                <th scope="col">وضعیت</th>
                                                @if ($brand->status == 1)
                                                <th scope="col">کد فروشگاه</th>
                                                @endif
                                                <th scope="col">اقدام</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="table-name">
                                                    <h6>{{++$brand->brand_name}}</h6>
                                                </td>
                                                <td class="table-name">
                                                    <h6>{{$brand->trade_id}}</h6>
                                                </td>
                                                <td class="table-brand">
                                                    <h6>{{$brand->city}}</h6>
                                                </td>
                                                <td class="table-brand">
                                                    <h6>{{$brand->address}}</h6>
                                                </td>
                                                <td class="table-brand">
                                                    <h6>{{$brand->post_code}}</h6>
                                                </td>
                                                <td class="table-brand">
                                                    <h6>{{$brand->email}}</h6>
                                                </td>
                                                <td class="table-brand">
                                                    @if ($brand->status == 0)
                                                    <h6 class="labale">در حال بررسی</h6>
                                                    @endif

                                                    @if($brand->status == 1)
                                                    <label class="label-text new">تایید شده</label>
                                                    @endif

                                                    @if($brand->status == 2)
                                                    <label class="label-text off">رد شده</label>
                                                    @endif
                                                </td>
                                                @if ($brand->status == 1)
                                                <td class="table-brand">
                                                    <h6>{{$brand->code}}</h6>
                                                </td>
                                                @endif
                                                <td class="table-action">
                                                    @if ($brand->status == 1)
                                                    <a class="view" href="{{route('show-update-sellers')}}"
                                                        title="جزئیات سفارش"><i class="far fa-eye"></i></a>
                                                    @endif

                                                    @if ($brand->status == 0)
                                                        <h6 class="labale">در حال بررسی</h6>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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