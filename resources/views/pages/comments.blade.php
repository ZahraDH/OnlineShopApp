@extends('layouts.app')

@section('content')

@include('../includes/single-banner-nuts',['title'=>'دیدگاه های شما','linkTiltle'=>'دیدگاه های شما'])

<section class="inner-section orderlist-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="orderlist">
                    <div class="orderlist-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-scroll p-0">
                                    @if ($comments == null)
                                    <p>برای این کاربر هیچ دیدگاهی وجود ندارد .</p>
                                    @else
                                    <table class="table-list">
                                        <thead>
                                            <tr>
                                                <th scope="col-1">شماره دیدگاه</th>
                                                <th scope="col-10">متن دیدگاه</th>
                                                <th scope="col-1">مشاهده کامل</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $i=0;
                                            @endphp
                                            @foreach ($comments as $comment)
                                            <tr>
                                                <td class="table-name">
                                                    <h6>{{++$i}}#</h6>
                                                </td>
                                                <td class="table-name">
                                                    <h6>{{$comment->comment}}</h6>
                                                </td>
                                                <td class="table-action">
                                                    <a class="view" href="{{route('comments.show',$comment->id)}}"
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