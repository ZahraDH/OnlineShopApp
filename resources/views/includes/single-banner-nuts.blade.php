<section class="inner-section single-banner">
    <div class="container">
        <h2>
            @isset($title)
                {{ $title }} 
            @endisset
        </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">خانه</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                @isset($linkTiltle)
                    {{ $linkTiltle }} 
                @endisset
            </li>
        </ol>
    </div>
</section>