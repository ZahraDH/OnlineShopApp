@extends('layouts.app')

@section('content')

@include('../includes/single-banner-nuts',['title'=>'لیست سفارش','linkTiltle'=>'لیست سفارش'])
<section class="inner-section orderlist-part">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="orderlist">
          <div class="orderlist-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="table-scroll p-0">
                  @if ($orders->count() == 0)
                      <p>برای این کاربر سفارشی ثبت نشده است .</p>
                  @else
                  <table class="table-list">
                    <thead>
                      <tr>
                        <th scope="col">شماره سفارش</th>
                        <th scope="col">نام</th>
                        <th scope="col">تاریخ</th>
                        <th scope="col">قیمت کل</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">مشاهده جزئیات فاکتور</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $order)
                      <tr>

                        <td class="table-name">
                          <h6>{{$order->id}}#</h6>
                        </td>
                        <td class="table-name">
                          <h6>{{Auth::user()->name}}</h6>
                        </td>
                        <td class="table-name">
                          <h6>{{date('Y-m-d', strtotime($order->created_at))}}</h6>
                        </td>
                        <td class="table-price">
                          <h6>{{$order->total_amount}} تومان</h6>
                        </td>
                        @if ($order->status == 1)
                        <td class="table-brand">
                          <h6 class="badge bg-success">تکمیل شده</h6>
                        </td>
                        @else
                        <td class="table-brand">
                          <h6 class="badge bg-danger">ناموفق</h6>
                        </td>
                        @endif
                        <td class="table-action">
                          <a class="view" href="invoice/{{$order->id}}" title="جزئیات سفارش"><i
                              class="far fa-eye"></i></a>
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