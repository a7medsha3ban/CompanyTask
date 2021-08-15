@extends('Layouts.dashboard-layout')
@section('content')

    <div class="card-header">
        Employee
    </div>

    <div>
        <h1>{{$employee->name}}</h1>
        <h5>{{$employee->email}}</h5>
        <h5>{{$employee->phone}}</h5>
        <h5>{{$employee->company->name}}</h5>
        <hr/>
        <a href="{{URL('/employees/edit/'.$employee->id)}}">Edit employee</a>
        <a href="{{URL('/employees/delete/'.$employee->id)}}">Delete employee</a>
        <a href="{{URL('/employees/list')}}">return to all employees</a>
    </div>
@endsection
