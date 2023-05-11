@extends('admin.dashboard')


@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-right">

            <h2>نقش ها</h2>

        </div>

        <div class="pull-left">

        @can('role-create')

            <a class="btn btn-success" href="{{ route('roles.create') }}">ایجاد نقش جدید</a>

            @endcan

        </div>

    </div>

</div>


@if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

@endif


<table class="table table-bordered">

  <tr>

     <th>#</th>

     <th>نام</th>

     <th width="280px">اقدامات</th>

  </tr>

    @foreach ($roles as $key => $role)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $role->name }}</td>

        <td>

            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">نمایش</a>

            @can('role-edit')

                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">ویرایش</a>

            @endcan

            @can('role-delete')

                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}

                    {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}

                {!! Form::close() !!}

            @endcan

        </td>

    </tr>

    @endforeach

</table>


{!! $roles->render() !!}


@endsection