@extends('Layouts.dashboard-layout')

@section('content')
    @if($errors)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
    <div class="card-header">
        Edit Company
    </div>
    <form action="{{URL('/companies/update/'.$company->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" value="{{$company->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone</label>
            <input type="text" value="{{$company->telephone}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="telephone">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" value="{{$company->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="text" value="{{$company->address}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address">
        </div>
        <button type="submit" class="btn btn-primary">Edit company</button>
    </form>

@endsection
