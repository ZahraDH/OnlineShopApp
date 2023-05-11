<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('../includes/head')
</head>
<body class="result-body" >
    
    <div class="container-fluid  result-container">
        <div class="row">
            <div class="col-12">
                <h6>نتیجه تراکنش</h6>
            </div>
            @if ($message = Session::get('success'))
            <div class="col-12">
                <p>{{$message}}</p>
            </div>
            <div class="col-12">
                <p> شماره پیگیری :
                    <span>{{$transaction->payment_id}}</span>
                </p>
            </div>
            <div class="col-12">
                <a href="{{route('orderList')}}" class="btn">مشاهده فاکتور</a>
            </div>
            @else
            <div class="col-12">
                <p>تراکنش شما ناموفق بود .</p>
            </div>
            <div class="col-12 failed-result">
                <a href="{{route('home')}}" class="btn">بازگشت به سایت</a>
            </div>
            @endif

         
        </div>
    </div>
    @include('../includes/script')
</body>
</html>
