@extends('layouts.dashboard')
@section('contents')

<div class="container" style="margin-top: 50px;" >
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        <h3 class="text"><b>Users Management</b></h2>
        </div>
        <div class="pull-right" style="margin-bottom: 10px;">
            <a class="btn btn-outline-success"  href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>

<table class="table">
        <thread>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Roles</th>
              <th>Update</th>
              <th>Delete</th>
            </tr>
        </thread>

  @foreach ($data as $key => $user)
    <tr>
        <th scope="row">{{ $key +1  }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          @can('role-list')
          @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
              <label>{{ $v }}</label>
            @endforeach
          @endif
          @endcan
        </td>
   
      <td>
        <a class="btn btn-outline-success" href="{{ route('users.edit',$user->id) }}">Update</a>
     
      </td>


      <td>
          <form action="{{route('users.destroy', $user->id) }}" method="POST">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-outline-danger">Delete</button>
          </form>
      </td>

    </tr>
  @endforeach
  </table>
</div>
@endsection