<!-- Brand Logo -->
<a href="dashboard" class="brand-link">
    <span class="brand-text font-weight-light">پنل مدیریت</span>
</a>

<!-- Sidebar -->
<div class="sidebar" style="direction: ltr">
    <div style="direction: rtl">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/adminpanel/dist/img/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <p>
                            داشبوردها
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('dashboard')}}" class="nav-link active">
                                <p>صفحه اصلی</p>
                            </a>
                        </li>
                    </ul>
                </li>


                @if (auth()->user()->can('role-list') && auth()->user()->can('role-edit') &&
                auth()->user()->can('role-delete') && auth()->user()->can('role-create'))
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <p>
                            سطوح دسترسی
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <p>نمایش سطوح دسترسی </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roles.create') }}" class="nav-link">
                                <p>اضافه کردن سطح دسترسی</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (auth()->user()->can('permission-list') && auth()->user()->can('permission-edit') &&
                auth()->user()->can('permission-delete') && auth()->user()->can('permission-create'))
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <p>
                            مجوزها
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('permission.index') }}" class="nav-link">
                                <p>نمایش مجوزها </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('permission.create') }}" class="nav-link">
                                <p>اضافه کردن مجوز</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (auth()->user()->can('user-list') && auth()->user()->can('user-edit') &&
                auth()->user()->can('user-delete') && auth()->user()->can('user-create'))
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <p>
                            کاربران
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <p>نمایش کاربران</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.create') }}" class="nav-link">
                                <p>اضافه کردن کاربر</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if (auth()->user()->can('supplier-list') && auth()->user()->can('supplier-edit') &&
                auth()->user()->can('supplier-delete') && auth()->user()->can('supplier-create'))
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <p>
                            فروشنده ها
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('brands.index') }}" class="nav-link">
                                <p>نمایش فروشنده ها </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('brands.create') }}" class="nav-link">
                                <p>اضافه کردن فروشنده</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (auth()->user()->can('category-list') && auth()->user()->can('category-edit') &&
                auth()->user()->can('category-delete') && auth()->user()->can('category-create'))
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <p>
                            دسته بندی ها
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <p>نمایش دسته بندی ها</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.create') }}" class="nav-link">
                                <p>اضافه کردن دسته بندی</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (auth()->user()->can('product-list') || auth()->user()->can('product-edit') ||
                auth()->user()->can('product-delete') || auth()->user()->can('product-create'))
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <p>
                            محصولات
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}" class="nav-link">
                                <p>نمایش محصولات </p>
                            </a>
                        </li>
                        @can('product-create')
                        <li class="nav-item">
                            <a href="{{ route('products.create') }}" class="nav-link">
                                <p>اضافه کردن محصول</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endif

                @if (auth()->user()->can('image-list') || auth()->user()->can('image-edit') ||
                auth()->user()->can('image-delete') || auth()->user()->can('image-create'))
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <p>
                            تصاویر
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('upload-image.index') }}" class="nav-link">
                                <p>نمایش تصاویر </p>
                            </a>
                        </li>
                        @can('image-create')
                        <li class="nav-item">
                            <a href="{{ route('upload-image.create') }}" class="nav-link">
                                <p>اضافه کردن تصویر</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endif

                @if (auth()->user()->can('order-list'))
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <p>
                            سفارشات
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show-orders') }}" class="nav-link">
                                <p>نمایش سفارشات ثبت شده </p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (auth()->user()->can('comment-list') && auth()->user()->can('comment-delete'))
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <p>
                            دیدگاه ها
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show-comments') }}" class="nav-link">
                                <p>مشاهده دیدگاه ها</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif






            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</div>