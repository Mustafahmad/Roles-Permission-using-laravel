@extends('layouts.app')
@section('content')

<section class="h-100 gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 200px;">
              <img src="{{ asset('images/' . $employee->image) }}"
                alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                style="width: 200px; z-index: 1;height: 200px">
                <a href="/employee.edit/{{ $employee->id }}"  type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                style='z-index: 1;' >
                Edit profile
                </a>
            </div>
            <div class="ms-3" style="margin-top: 130px;">
              <h5>{{$employee->name}}</h5>
            </div>
          </div>
          <div class="p-4 text-black" style="background-color: #f8f9fa;">
            <div class="d-flex justify-content-end text-center py-1">
              <div>
                <p class="mb-1 h5">Email</p>
                <p class="small text-muted mb-0">{{ $employee->email }}</p>
              </div>
              <div>
                <p class="mb-1 h5">Age</p>
                <p class="small text-muted mb-0">{{ $employee->age }}</p>
              </div>
            </div>
          </div>
          <div class="card-body p-4 text-black">
            <div class="mb-5">
              <p class="lead fw-normal mb-1">About</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-1">{{ $employee->designation->name }}</p>
                <p class="font-italic mb-1"> Joins {{ $employee->join }}</p>
                <p class="font-italic mb-0">{{ $employee->department->name}} Department</p>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection