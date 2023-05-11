@extends('admin.dashboard')

@section('content')
@hasanyrole('Admin')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $success_orders_for_admin}}</h3>

                        <p>سفارشات موفق</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$failed_orders_for_admin}}</h3>

                        <p>سفارشات ناموفق</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$users_for_admin}}</h3>

                        <p>کاربران ثبت شده</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$comments_for_admin}}</h3>

                        <p>دیدگاه های ثبت شده</p>
                    </div>
                    <div class="icon">
                        <i class="glyphicon glyphicon-comment" style="margin-top: 10px"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-12 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{$amount_of_sells_for_admin}} تومان</h3>

                        <p>فروش کل</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>

            
</section>
@endrole

@hasanyrole('supplier')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $success_orders_for_sellers }}</h3>

                        <p>سفارشات موفق</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$failed_orders_for_sellers}}</h3>

                        <p>سفارشات ناموفق</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
           
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$comments_for_sellers}}</h3>

                        <p>دیدگاه های ثبت شده</p>
                    </div>
                    <div class="icon">
                        <i class="glyphicon glyphicon-comment" style="margin-top: 10px"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{$amount_of_sells_for_sellers}} تومان</h3>

                        <p>فروش کل</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>

        </div>

</section>
@endrole

@endsection