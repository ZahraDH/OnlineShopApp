@php
$totalQuantity = 0;
if (session('cart')){
foreach (session('cart') as $id => $details) {
$totalQuantity += $details['quantity'];
}
}
@endphp
<div class="header-part">
    <div class="container-fluid">
        <div class="header-content-group">
            <div class="header-widget-group left">
                <button class="header-widget header-user" title="حساب من"></button><a class="header-logo" href="home"><img src="{{asset('assets/img/logo.png')}}" alt="لوگو"></a>
                <button class="header-widget header-src" title="نوار جستجو"><i class="far fa-search"></i></button>
            </div>
            <form class="header-form" action="{{route('search')}}" method="GET">
                @csrf
                <input type="search" placeholder="مورد خود را در اینجا جستجو کنید ..." name="search"><button type="submit"><i class="far fa-search"></i></button>
            </form>
            <div class="header-widget-group right" style="margin-left: 78px;">
                @guest
                       <div class="header-widget-group header-login">
                            <a class="header-widget user-icon" title="حساب من"><i class="fa fa-user"></i></a>
                            @if (Route::has('login'))
                                <a class="navbar-link header-widget right-a" href="{{ route('login') }}">{{ __('ورود') }}</a> 
                            @endif
                            <span class="navbar-link header-widget">/</span>
                            @if (Route::has('register'))
                                <a class="navbar-link header-widget left-a"  href="{{ route('register') }}">{{ __('ثبت نام') }}</a>
                            @endif
                       </div>
                    @else
                        <ul class="navbar-list header-widget" style="margin-bottom:0;padding-left:1rem;">
                            <li class="navbar-item dropdown header-icons">
                                <a class="header-widget"><i class="fa fa-user"></i></a>
                                <ul class="dropdown-position-list">
                                    @hasanyrole('Admin') 
                                    <li><a href="dashboard">داشبورد</a></li>
                                    @endrole   

                                    <li><a href="{{route('profile')}}"> پروفایل</a></li>
                                    @hasanyrole('supplier')
                                    @if (Auth::user()->status == 2)
                                        <li><a href="dashboard">داشبورد</a></li>   
                                    @endif 
                                    <li><a href="{{route('check-situaition')}}"> فروشگاه</a></li>
                                    @endrole
                                    <li><a href="{{route('addresses.index')}}"> آدرس ها</a></li>
                                    <li><a href="{{route('comments.index')}}"> دیدگاه ها</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('خروج') }}
                                            </a>
            
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                       
                @endguest
                <button class="header-widget header-cart" title="سبد خرید"><i class="far fa-shopping-cart"></i><sup> {{ $totalQuantity }}</sup></button>
                <div class="header-border header-widget"></div>
            </div>
        </div>
    </div>
</div>