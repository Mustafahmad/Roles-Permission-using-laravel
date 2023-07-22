@extends('layouts.app')
@section('content')




        <div class="container" style="margin-top: 50px;">
            <div class="row">


                <div class="col-lg-6">
                    <h3 class="text"><b>Update Designation</b></h3>
				    <div class="form-group">
                        <form action="/designation.update/{{ $designation->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method("put")
                         <input type="text" name="name" class="form-control m-2" placeholder="name" value="{{ $designation->name }}">

                         <select name="department_id" id="" class="form-control">
                            <option selected value="">Select Department</option>
                            @foreach ($department as $dept)
                            <option value="{{$dept->id}}">{{$dept->name}}</option>
                            @endforeach
                         </select>
        
                        <button type="submit" class="btn btn-success mt-3 ">Submit</button>
                        </form>
                   </div>
                </div>
            </div>
@endsection
