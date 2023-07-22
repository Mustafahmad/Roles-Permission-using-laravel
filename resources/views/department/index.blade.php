@extends('layouts.dashboard')
@section('contents')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="container-fluid">
    <h3 class="text"><b>Department</b> </h3>
        @include('flash-message')
        @can('department-create')
        <a href="{{route('department.create')}}" class="btn btn-outline-success" style="margin-bottom: 10px;">Add New Department</a>
        @endcan
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Department</th>
                @can('department-edit')
                <th>Update</th>
                @endcan
                @can('department-delete')
                <th>Delete</th>
                @endcan
 
            </tr>
        </thead>
 
            <tbody>

            @foreach ($departments as $index => $department)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $department->name }}</td>
                        @can('department-edit')
                        <td><a href="{{route('department.edit', $department->id) }}" class="btn btn-outline-success">Update</a></td>
                        @endcan
                     
                        <td>
                        @can('department-delete')
                        <form action="{{ route('department.destroy', $department->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                        @endcan

                        </td>
                @endforeach

            </tbody>
        </table>
    </div>
    </div>
@endsection   