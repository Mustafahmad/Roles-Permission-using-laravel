@extends('layouts.app')
@section('content')


        <div class="container" style="margin-top: 50px;">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                @include('flash-message')
                    <h3 class="text"><b>Add New Department </b> </h3>
				    <div class="form-group">
                        <form action="{{route('department.store')}}" method="POST" enctype="multipart/form-data">
                         @csrf
        				 <input type="text" name="name" class="form-control m-2" placeholder="Name">
                        <button type="submit" class="btn btn-success mt-3 ">Submit</button>
                        </form>
                   </div>
                </div>
            </div>
@endsection