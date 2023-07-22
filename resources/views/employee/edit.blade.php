@extends('layouts.app')
@section('content')

   <div class="container" style="margin-top: 50px;">
        <div class="row"> 


            <div class="col-lg-6">
                <h3 class="text"><b>Update Employee</b> </h3>
                <div class="form-group">
                    <form action="/employee.update/{{ $employee->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="text" name="name" class="form-control m-2" placeholder="Name"
                            value="{{ $employee->name }}">
                        <input type="email" name="email" class="form-control m-2" placeholder="Email"
                            value="{{ $employee->email }}">
                        <strong> Date of joining:</strong>
                        <input type="date" name="join" class="form-control m-2" placeholder="Joining date"
                            value="{{ $employee->join }}">
                        <strong> Date of birth:</strong>
                        <input type="date" name="dob" class="form-control m-2" placeholder="Date of birth"
                            value="{{ $employee->dob }}">
                        <input type="text" name="address" class="form-control m-2" placeholder="Address"
                            value="{{ $employee->address }}">
                        <select name="department_id" id="" class="form-control">
                            <option selected value="">Select Department</option>
                            @foreach ($depts as $dept)
                                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                            @endforeach
                        </select>
                        <select name="designation_id" id="" class="form-control">
                            <option selected value="">Select Designation</option>
                            @foreach ($desgs as $desg)
                                <option value="{{ $desg->id }}">{{ $desg->name }}</option>
                            @endforeach
                        </select>
                        <input type="file" name="image" class="form-control m-2" placeholder="Add a picture"
                            value="{{ $employee->image }}">
                        <button type="submit" class="btn btn-success mt-3 ">Submit</button>
                    </form>
                </div>
            </div>
        </div>
   </div>

@endsection
