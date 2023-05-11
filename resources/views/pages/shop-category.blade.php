@extends('layouts.app')

@section('content')

@include('../includes/single-banner-nuts',['title'=>'شبکه مغازه','linkTiltle'=>'شبکه مغازه'])

<section class="inner-section shop-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-1 order-lg-0">
                <div class="shop-widget">
                    <h6 class="shop-widget-title">دسته بندی</h6>
                    <ul class="shop-widget-list shop-widget-scroll">
                        @foreach ($categories as $category)
                        @if ($category->parent_id == null)
                        <li data-id="{{$category->id}}">
                            <a href="{{route('get-Category-parent',$category->id)}}">{{$category->category_name}}</a>
                            <ul class="shop-category-filter" data-id="{{$category->id}}" id="{{$category->id}}">
                                @foreach ($categories as $ordination)
                                @if ($ordination->parent_id == $category->id)
                                <li>
                                    <a
                                        href="{{route('get-Category',$ordination->id)}}">{{$ordination->category_name}}</a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                            <div class="shop-toggle">
                                <span class="material-icons icon-click">arrow_drop_down</span>
                            </div>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                <div class="shop-widget">
                    <h6 class="shop-widget-title">برچسب ها</h6>
                    <ul class="shop-widget-list">
                        <li>
                            <div class="shop-widget-content">
                                <div class="form-check">
                                    <a href="{{route('get-tag-new')}}">موارد جدید</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="shop-widget-content">
                                <div class="form-check">
                                    <a href="{{route('get-tag-discount')}}">موارد تخفیف دار</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="shop-widget-content">
                                <div class="form-check">
                                    <a href="{{route('get-tag-popular')}}">موارد پرطرفدار</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-9 order-0 order-lg-1">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shop-filter">
                            <p>نمایش {{$products->count()}} نتیجه</p>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4">
                    @forelse ($products as $product)
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <a class="product-image" href="{{url('product-details/'.$product->id)}}"><img
                                        src="@if($product->showImagePath()->first() != null ) {{asset($product->showImagePath()->first()->getFirstMediaUrl('images'))}} @endif" alt="تولید - محصول"></a>
                            </div>
                            <div class="product-content">
                                <h6 class="product-name"><a
                                        href="{{url('product-details/'.$product->id)}}">{{$product->name}}</a></h6>
                                <div class="product-price">
                                    <div>{{$product->price}} تومان</div>
                                    <a class="product-add" title="افزودن به سبد خرید"
                                        href="{{ route('product-details', $product->id) }}"><i
                                            class="far fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="not-found">
                        <p>موردی یافت نشد!</p>
                    </div>
                    @endforelse
                    
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-center pagin-division">
                            {!! $products->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection