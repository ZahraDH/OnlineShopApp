@php
$totalQuantity = 0;
if (session('cart')){
foreach (session('cart') as $id => $details) {
$totalQuantity += $details['quantity'];
}
}
@endphp
<aside class="cart-part">
    <div class="cart-container">
        <div class="cart-header">
            <div class="cart-total"><i class="far fa-shopping-cart"></i><span>کل مورد ({{$totalQuantity}} )</span></div>
            <button class="cart-close"><i class="far fa-times"></i></button>
        </div>
        <ul class="cart-list">
            @php $total = 0; $totalDiscount = 0; @endphp
            @if(session('cart'))
            @foreach(session('cart') as $id => $details)
            @php $total += $details['price']; $totalDiscount += $details['discount']; @endphp
            <li class="cart-item" data-id="{{ $id }}">
                <div class="cart-media actions" data-th="">
                    <a href="{{route('cart-page')}}"><img src="{{asset($details['image'])}}" alt="تولید - محصول"></a>
                </div>
                <div class="cart-info-group">
                    <div class="cart-info">
                        <h6><a href="cart-page">{{ $details['name'] }}</a></h6>
                    </div>
                    <div class="cart-action-group">
                        <p>
                            <del>{{$details['price']}}</del>
                            <span>{{ $details['price'] - $details['discount']}} تومان</span>
                            <span>× {{$details['quantity']}}</span>
                        </p>
                    </div>
                </div>
            </li>
            @endforeach
            @endif
        </ul>
        <div class="cart-footer">
            <p>
                <span>جمع کل سبد خرید :</span>
                <span>{{ $total - $totalDiscount }} تومان</span>
            </p>
            <a class="cart-checkout-btn" href="{{route('cart-page')}}"><span class="checkout-label">مشاهده سبد خرید</span></a>
        </div>
    </div>
</aside>