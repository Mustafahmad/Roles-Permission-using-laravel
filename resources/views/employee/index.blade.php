@extends('layouts.dashboard')
@section('contents')
    <div class="container" style="margin-top: 50px;">
        <h3 class="text"><b>Employee Management</b> </h3>
        @include('flash-message')
        @can('employee-create')
            <a href="{{ route('employee.create') }}" class="btn btn-outline-success" style="margin-bottom: 10px;">Add New
                Employee</a>
        @endcan
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    @can('employee-edit')
                    <th>Update</th>
                    @endcan
                    @can('employee-delete')
                    <th>Delete</th>
                    @endcan

                </tr>
            </thead>

            <tbody>

                @foreach ($emps as $index => $emp)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>

                        <td>{{ $emp->name }}</td>
                        <td>{{ $emp->email }}</td>
                        @can('employee-edit')
                            <td><a href="{{ route('employee.edit', $emp->id) }}" class="btn btn-outline-success">Update</a></td>
                        @endcan
                        <td>
                            @can('employee-delete')
                                <form action="{{ route('employee.destroy', $emp->id) }}" method="POST">
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
