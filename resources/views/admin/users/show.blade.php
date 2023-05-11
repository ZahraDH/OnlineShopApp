@extends('admin.dashboard')


@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-right">

            <h2>نمایش اطلاعات کاربر</h2>

        </div>

        <div class="pull-left">

            <a class="btn btn-primary" href="{{ route('users.index') }}">بازگشت به صفحه قبل</a>

        </div>

    </div>

</div>


<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>نام کاربری:</strong>

            {{ $user->name }}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>ایمیل:</strong>

            {{ $user->email }}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>سطح دسترسی:</strong>

            @if(!empty($user->getRoleNames()))

                @forelse($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @empty
                    <label class="badge badge-success">user</label>
                @endforelse
                
            @endif

        </div>

    </div>

</div>

<table class="table table-bordered">

    <tr>

        <th>نام </th>

        <th>نام خانوادگی</th>

        <th>شهر</th>

        <th>آدرس</th>

        <th>شماره تماس</th>

        <th>کد پستی</th>

        <th>شماره کارت</th>

    </tr>

    
    @foreach ($users as $userr)
    <tr>


        <td>{{ $user->first_name }}</td>

        <td>{{ $user->last_name }}</td>

        <td>@if (isset($userr->city))
            {{ $userr->city }}
        @endif</td>

        <td>@if (isset($userr->address))
            {{ $userr->address }}
        @endif</td>

        <td>@if (isset($userr->phone_number))
            {{ $userr->phone_number }}
        @endif</td>

        <td>@if (isset($userr->post_code))
            {{ $userr->post_code }}
        @endif</td>

        <td>@if (isset($userr->credit_card))
            {{ $userr->credit_card }}
        @endif</td>


    </tr>
    @endforeach
 

</table>
@endsection