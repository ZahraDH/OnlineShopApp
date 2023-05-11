<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('../includes/head')
</head>
<body>

    
       
    @include('../includes/header')
    @include('../includes/navbar')
    @include('../includes/cart')
    
    <div id="app">
    

        <main>
            @yield('content')
        </main>
    </div>
    @include('../includes/script')
    @include('../includes/footer')
</body>
</html>
