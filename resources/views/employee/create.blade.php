@extends('layouts.app')
@section('content')

<div class="container" style="margin-top: 50px;">
   <div class="row">


         <div class="col-lg-3"></div>
         <div class="col-lg-6">
            <h3 class="text"><b>Add New Employee</b> </h3>
         <div class="form-group">
               <form action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="text" name="name" class="form-control m-2" placeholder="Name">
                  <input type="email" name="email" class="form-control m-2" placeholder="Email">
                  <strong> Date of joining:</strong> 
                  <input type="date" name="join" class="form-control m-2" placeholder="Joining date">
                  <strong> Age: </strong> 
                  <input type="number" name="age" class="form-control m-2" placeholder="Age">
                  <select name="department_id" id="" class="form-control">
                     <option selected value="">Select Department</option>
                     @foreach ($depts as $dept)
                     <option value="{{$dept->id}}">{{$dept->name}}</option>
                     @endforeach
                  </select>
                  <select name="designation_id" id="" class="form-control">
                     <option selected value="">Select Designation</option>
                     @foreach ($desgs as $desg)
                     <option value="{{$desg->id}}">{{$desg->name}}</option>
                     @endforeach
                  </select>
                  <input type="file" name="image" class="form-control m-2" placeholder="Add a picture">
               <button type="submit" class="btn btn-success mt-3 ">Submit</button>
               </form>
            </div>
         </div>
   </div>
@endsection