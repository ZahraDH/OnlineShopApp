@extends('admin.dashboard')


@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-right">

            <h2>مدیریت کاربران</h2>

        </div>

        <div class="pull-left">

            <a class="btn btn-success" href="{{ route('users.create') }}"> افزودن کاربر جدید</a>

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

   <th>No</th>

   <th>نام کاربری</th>

   <th>ایمیل</th>

   <th>سطح دسترسی</th>

   <th width="280px">اقدامات</th>

 </tr>

 @foreach ($data as $key => $user)

  <tr>

    <td>{{ ++$i }}</td>

    <td>{{ $user->name }}</td>

    <td>{{ $user->email }}</td>

    <td>

      @if(!empty($user->getRoleNames()))
       
        @forelse($user->getRoleNames() as $v)

           <label class="badge badge-success">{{ $v }}</label>
        @empty  
        <label class="badge badge-success">user</label>
        @endforelse
        
      @endif

    </td>

    <td>

       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">نمایش</a>

       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">ویرایش</a>

        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}

            {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}

        {!! Form::close() !!}

    </td>

  </tr>

 @endforeach

</table>


{!! $data->render() !!}


@endsection