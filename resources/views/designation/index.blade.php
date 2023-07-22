@extends('layouts.dashboard')
 @section('contents')

<div class="container" style="margin-top: 50px;">
    <h3 class="text"><b>Desgination</b> </h3>
    @include('flash-message')
    @can('designation-create')
    <a href="{{route('designation.create')}}" class="btn btn-outline-success" style="margin-bottom: 10px;" >Add New Desgination</a>
    @endcan

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Desgination</th>
            <th>Deptartment</th>
            @can('designation-edit')
            <th>Update</th>
            @endcan
            @can('designation-delete')
            <th>Delete</th>
            @endcan
          
        </tr>
    </thead>

        <tbody>

        @foreach ($designations as $index => $desg)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $desg->name }}</td>
                    <td>{{ $desg->department->name}}</td>
                    @can('designation-edit')
                    <td><a href="{{route('designation.edit',$desg->id)}}" class="btn btn-outline-success">Update</a></td>
                    @endcan
                    
                    <td>
                    @can('designation-delete')
                    <form action="{{ route('designation.destroy', $desg->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                    @endcan
                </td>

            </tr>

            @endforeach

        </tbody>
    </table>
</div>
@endsection