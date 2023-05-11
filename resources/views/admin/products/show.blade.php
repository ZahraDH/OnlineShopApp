@extends('admin.dashboard')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <h2> نمایش محصول</h2>

            </div>

            <div class="pull-left">

                <a class="btn btn-primary" href="{{ route('products.index') }}">بازگشت به صفحه قبل</a>

            </div>

        </div>

    </div>


    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>نام محصول:</strong>

                {{ $product->name }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong> دسته بندی محصول:</strong>

                {{ $product->category_id }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>  شناسه محصول:</strong>

                {{ $product->sku }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>  وزن محصول:</strong>

                {{ $product->weight }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>  برند محصول:</strong>

                {{ $product->brand }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>توضیحات:</strong>

                {{ $product->description }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>  تعداد این محصول:</strong>

                {{ $product->quantity }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>قیمت:</strong>

                {{ $product->price }} تومان

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>تخفیف محصول:</strong>

                {{ $product->discount }} تومان

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>نام فروشنده:</strong>

                @foreach ($users as $user)
                    @if ($user->id == $product->user_id)
                        {{ $user->email }}
                    @endif
                @endforeach

            </div>

        </div>

    </div>

@endsection

<p class="text-center text-primary"><small></small></p>