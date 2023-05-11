@extends('admin.dashboard')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <h2> نمایش تصویر</h2>

            </div>

            <div class="pull-left">

                <a class="btn btn-primary" href="{{ route('upload-image.index') }}"> بازگشت به صفحه نخست</a>

            </div>

        </div>

    </div>


    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>نام محصول:</strong>

                {{ $image->product->name }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong> تصویر  :</strong>

                <img src="{{asset($image->getFirstMediaUrl('images') )}}" alt="" style="width: 500px">


            </div>

        </div>

    </div>

@endsection
