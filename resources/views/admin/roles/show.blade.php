@extends('admin.dashboard')


@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-right">

            <h2>نمایش نقش</h2>

        </div>

        <div class="pull-left">

            <a class="btn btn-primary" href="{{ route('roles.index') }}"> بازگشت به صفحه قبل</a>

        </div>

    </div>

</div>


<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>نام :</strong>

            {{ $role->name }}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>سطوح دسترسی:</strong>

            @if(!empty($rolePermissions))

                @foreach($rolePermissions as $v)

                    <label class="label label-success">{{ $v->name }},</label>

                @endforeach

            @endif

        </div>

    </div>

</div>

@endsection