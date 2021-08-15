@extends('Layouts.dashboard-layout')

@section('content')
    @if($errors)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
    <div class="card-header">
        Edit Employee
    </div>
    <form action="{{URL('/employees/update/'.$employee->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" value="{{$employee->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone</label>
            <input type="text" value="{{$employee->phone}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" value="{{$employee->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        </div>
        <button type="submit" class="btn btn-primary">Edit Employee</button>
    </form>

@endsection
