@extends('Layouts.dashboard-layout')

@section('content')
    @if($errors)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
    <div class="card-header">
        Create Company
    </div>
    <form action="{{URL('/companies/add')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">telephone</label>
            <input type="text" value="{{old('telephone')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="telephone">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Address</label>
            <input type="text" value="{{old('address')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address">
        </div>

        <button type="submit" class="btn btn-primary">Add company</button>
    </form>

@endsection
