<nav class="navbar-part">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="navbar-content">
          <ul class="navbar-list">
            <li class="navbar-item dropdown">
              <a class="navbar-link " href="{{route('home')}}">صفحه اصلی</a>
            </li>
            <li class="navbar-item dropdown">
              <a class="navbar-link" href="{{route('shop-grid')}}">خرید</a>
            </li>

            @foreach ($categories as $category)

            @if ($category->id == 1)
            <li class="navbar-item dropdown">
              <button  class="navbar-link dropdown-arrow" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{$category->category_name}}</button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDarkDropdownMenuLink">
                @foreach ($categories as $category_item)
                @if ($category_item->parent_id == $category->id)
                <li>
                  <a href="{{route('get-Category',$category_item->id)}}" class="dropdown-item">{{$category_item->category_name}}</a>
                </li>
                @endif    
                @endforeach
              </ul>
            </li>
            @endif

            @if ($category->id == 2)
            <li class="navbar-item dropdown">
              <button class="navbar-link dropdown-arrow" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{$category->category_name}}</button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDarkDropdownMenuLink">
                @foreach ($categories as $category_item)
                @if ($category_item->parent_id == $category->id)
                <li>
                  <a href="{{route('get-Category',$category_item->id)}}" class="dropdown-item">{{$category_item->category_name}}</a>
                </li>
                @endif    
                @endforeach
              </ul>
            </li>
            @endif

            @if ($category->id == 3)
            <li class="navbar-item dropdown">
              <button class="navbar-link dropdown-arrow" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{$category->category_name}}</button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDarkDropdownMenuLink">
                @foreach ($categories as $category_item)
                @if ($category_item->parent_id == $category->id)
                <li>
                  <a href="{{route('get-Category',$category_item->id)}}" class="dropdown-item">{{$category_item->category_name}}</a>
                </li>
                @endif    
                @endforeach
              </ul>
            </li>
            @endif



            @if ($category->id == 4)
            <li class="navbar-item dropdown">
              <button class="navbar-link dropdown-arrow" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{$category->category_name}}</button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDarkDropdownMenuLink">
                @foreach ($categories as $category_item)
                @if ($category_item->parent_id == $category->id)
                <li>
                  <a href="{{route('get-Category',$category_item->id)}}" class="dropdown-item">{{$category_item->category_name}}</a>
                </li>
                @endif    
                @endforeach
              </ul>
            </li>
            @endif


            @if ($category->id == 5)
            <li class="navbar-item dropdown">
              <button class="navbar-link dropdown-arrow" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{$category->category_name}}</button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDarkDropdownMenuLink">
                @foreach ($categories as $category_item)
                @if ($category_item->parent_id == $category->id)
                <li>
                  <a href="{{route('get-Category',$category_item->id)}}" class="dropdown-item">{{$category_item->category_name}}</a>
                </li>
                @endif    
                @endforeach
              </ul>
            </li>
            @endif


            @endforeach

            @guest
                
            <li class="navbar-item dropdown">
              <a class="navbar-link" href="{{route('becoming-seller')}}">فروشنده شوید</a>
            </li>
            @endguest

          </ul>

          <div style="margin-left: 50px;">
            <a href="{{route('orderList')}}" class="btn btn-inline btn-navbar">
              <span>پیگیری سفارشات</span>
            </a>
          </div>

        </div>
      </div>

    </div>
  </div>
</nav>