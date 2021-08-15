@extends('Layouts.dashboard-layout')

@section('content')
    @if($errors)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
    <div class="card-header">
        Create Employee
    </div>
    <form action="{{URL('/employees/add')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone</label>
            <input type="text" value="{{old('phone')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="password" value="{{old('password')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password">
        </div>
        <div class="mb-3">
        <select name="company_id" class="form-control" aria-label="Default select example">
                <option selected>Companies</option>
            @foreach($companies as $company)
                <option value="{{$company->id}}">{{$company->name}}</option>
        @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add employee</button>
    </form>
@endsection
