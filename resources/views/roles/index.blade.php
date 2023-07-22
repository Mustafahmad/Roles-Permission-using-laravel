@extends('layouts.dashboard')
@section('contents')

<div class="container" style="margin-top: 50px;">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        <h3 class="text"><b>Role Management</b></h3>
        </div>
        <div class="pull-right" style="margin-bottom: 10px;">
        @include('flash-message')
        @can('role-create')
            <a class="btn btn-outline-success" href="{{ route('roles.create') }}"> Create New Role</a>
        @endcan
        </div>
    </div>
</div>

    <table class="table">
        <thread>
            <tr>
                <th>No</th>
                <th>Name</th>
                @can('role-edit')
                <th>Update</th>
                @endcan
                @can('role-delete')
                <th>Delete</th>
                @endcan
            </tr>
        </thread>
        <tbody>
                @foreach ($roles as $key => $role)
            <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $role->name }}</td>

                @can('role-edit')
                <td><a class="btn btn-outline-success" href="{{ route('roles.edit',$role->id) }}">Update</a></td>
                @endcan
                @can('role-delete')
                <td>
                    <form action="{{route('roles.destroy', $role->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </td> 
            </tr>
            @endcan
                @endforeach
        </tbody>
    </table>
</div>


@endsection