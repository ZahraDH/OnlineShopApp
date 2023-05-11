@extends('layouts.app')

@section('content')

@include('../includes/single-banner-nuts',['title'=>'جزئیات محصول','linkTiltle'=>'جزئیات محصول'])
<section class="inner-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-5">
            <div class="details-gallery">
               <ul class="details-preview">
                  @foreach ($images as $image)
                  @if ($image->product_id == $product->id)
                  <li><img src="{{asset($image->getFirstMediaUrl('images'))}}" alt="تولید - محصول"></li>
                  @endif
                  @endforeach
               </ul>
               <ul class="details-thumb">
                  @foreach ($images as $image)
                  @if ($image->product_id == $product->id)
                  <li><img src="{{asset($image->getFirstMediaUrl('images'))}}" alt="تولید - محصول"></li>
                  @endif
                  @endforeach
               </ul>
            </div>
         </div>
         <div class="col-lg-7">
            <div class="details-content">
               <h3 class="details-name"><a href="#">{{$product->name}}</a></h3>
               <div class="details-meta">
                  <p>کد محصول: <span>{{$product->sku}}</span></p>
                  <p><a href="#">مارک</a> تجاری: <a href="#">{{$product->brand}}</a></p>
               </div>
               <h3 class="details-price">
                  @if ($product->discount != null)
                  <del> {{$product->price}} تومان</del><span>{{(($product->price)-(($product->price) *
                     $product->discount)/100)}} تومان </span>
                  @else
                  <span>{{($product->price)}} تومان </span>
                  @endif
                 
               </h3>
               <p class="details-desc">{{$product->description}}</p>
               <div class="details-list-group">
                  <label class="details-list-title">برچسب ها:</label>
                  <ul class="details-tag-list">
                     <li><a href="#">{{$category->category_name}}</a></li>
                     @if (isset($parentOfCategory->category_name))
                     <li>
                        <a href="#">
                           {{$parentOfCategory->category_name}}
                        </a>
                     </li>
                     @endif
                     @if (isset($parentParentOfCategory->category_name))
                     <li>
                        <a href="#">
                           {{$parentParentOfCategory->category_name}}
                        </a>
                     </li>
                     @endif
                  </ul>
               </div>
               <div class="details-list-group">
                  <label class="details-list-title">در انبار:</label>
                  @if ($product->quantity != 0)
                  <div>در دسترس</div>
                  @else
                  <div>ناموجود </div>
                  @endif
               <form action="{{route('add.to.cart' , $product->id)}}" method="POST">
                  @csrf
               </div>
               <div class="details-list-group">
                  <label class="details-list-title">تعداد:</label>
                  <div class="cart-action-group">
                     <div class="product-action">
                        <a class="action-minus update-quantity" title="مقدار منهای"><i class="far fa-minus"></i></a><input
                           class="action-input" title="تعداد" type="text" name="quantity" value="1">
                        <a class="action-plus update-quantity" title="مقدار به علاوه"><i class="far fa-plus"></i></a>
                     </div>
                  </div>
               </div>
               <div class="details-add-group">
                  <button type="submit" class="product-add w-100" 
                   ><i class="far fa-shopping-cart"></i><span>افزودن به
                        سبد خرید</span></button>
               </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>


<section class="inner-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <ul class="nav nav-tabs">
               <li><a href="#tab-desc" class="tab-link active" data-bs-toggle="tab">توضیحات</a></li>
               <li><a href="#tab-spec" class="tab-link" data-bs-toggle="tab">اطلاعات اضافی</a></li>
               <li><a href="#tab-reve" class="tab-link" data-bs-toggle="tab">نظرات </a></li>
            </ul>
         </div>
      </div>
      <div class="tab-pane active" id="tab-desc">
         <div class="row">
            <div class="col-lg-12">
               <div class="product-details-frame product-details">
                  <div class="tab-descrip">
                     <p>
                        {{$product->description}}
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="tab-pane" id="tab-spec">
         <div class="row">
            <div class="col-lg-12">
               <div class="product-details-frame">
                  <table class="table table-bordered">
                     <tbody>
                        <tr>
                           <th scope="row">وزن</th>
                           <td>{{$product->weight}} کیلوگرم</td>
                        </tr>
                        <tr>
                           <th scope="row">دسته بندی</th>
                           <td>
                              {{$category->category_name}}
                              @if (isset($parentOfCategory->category_name))
                              {{$parentOfCategory->category_name}}
                              @endif
                              @if (isset($parentParentOfCategory->category_name))
                              {{$parentParentOfCategory->category_name}}
                              @endif
                           </td>
                        </tr>
                        <tr>
                           <th scope="row">برند</th>
                           <td>{{$product->brand}}</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class="tab-pane" id="tab-reve">
         <div class="row">
            <div class="col-lg-12">
               <div class="product-details-frame">
                  <ul class="review-list">
                     @foreach ($comments as $comment)
                     <li class="review-item">
                        <div class="review-media">
                           <a class="review-avatar" href="#"><img src="{{asset('/adminpanel/dist/img/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg')}}" alt="مرور"></a>
                           <h5 class="review-meta"><a
                                 href="#">{{$comment->user->name}}</a><span>{{date('Y-m-d', strtotime($comment->created_at))}}</span></h5>
                        </div>
                        <p class="review-desc">{{$comment->comment}}</p>
                     </li>
                     @endforeach
                  </ul>
               </div>
               <div class="product-details-frame p-5">
                  <h3 class="frame-title">بررسی خود را اضافه کنید</h3>
                  <form class="review-form" action="{{route('comments.store')}}" method="POST">
                     @csrf
                     <div class="row">


                        <div class="col-lg-6" style="display: none">
                           <div class="form-group"><input type="text" class="form-control" name="product_id"
                                 placeholder="product" value="{{$product->id}}"></div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group"><textarea class="form-control" name="comment"
                                 placeholder="دیدگاه شما"></textarea></div>
                        </div>
                        <div class="col-lg-12">
                           <button type="submit" class="btn btn-inline"><span>دیدگاه
                                 خود را ثبت کنید</span></button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection