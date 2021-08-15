@extends('Layouts.dashboard-layout')
@section('content')
    <div class="card-header">
        {{$company->name}}
    </div>
    <table id="datatablesSimple">
        <thead>
        <tr>
            <th scope="col">
                Name
            </th>
            <th scope="col">
                Email
            </th>
            <th scope="col">
                Telephone
            </th>
            <th scope="col">
                Company
            </th>
        </tr>
        </thead>

        @foreach($employees as $employee)
            <tr>
                <td>{{$employee->name}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->company->name}}</td>
            </tr>
        @endforeach

    </table>
@endsection
