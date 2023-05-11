<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">داشبورد</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ul class="list-group list-group-flush d-flex flex-row float-sm-left">
                    <li class="list-group-item" style="margin-top: 4px"><a href="{{route('home')}}" style="color: black">خانه</a></li>
                    <li class="list-group-item">
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
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>