@extends('layouts.app')

@section('content')

@include('../includes/single-banner-nuts',['title'=>'ویرایش دیدگاه','linkTiltle'=>'ویرایش دیدگاه'])

<section class="inner-section profile-part">
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <div class="account-card">
          <div class="account-title">
            <h4>دیدگاه</h4>
            <form action="{{route('comments.destroy',$comment->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-inline btn-navbar">حذف کردن
                دیدگاه</button>
            </form>
          </div>
          <form class="review-form" action="{{route('comments.update',$comment->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-lg-6" style="display: none">
                <div class="form-group"><input type="text" class="form-control" name="user_id" placeholder="product"
                    value="{{$comment->user_id}}"></div>
              </div>
              <div class="col-lg-6" style="display: none">
                <div class="form-group"><input type="text" class="form-control" name="product_id" placeholder="product"
                    value="{{$comment->product_id}}"></div>
              </div>
              <div class="col-lg-12">
                <div class="form-group"><textarea class="form-control" name="comment">{{$comment->comment}}</textarea>
                </div>
              </div>
              <div class="col-lg-12">
                <button type="submit" class="btn btn-inline"><span>دیدگاه خود را
                    ویرایش کنید</span></button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>


@endsection