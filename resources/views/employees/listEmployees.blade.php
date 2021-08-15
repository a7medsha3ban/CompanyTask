@extends('Layouts.dashboard-layout')

@section('content')
    <div class="card-header">
        employees
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
            <th></th>
        </tr>
        </thead>

        @foreach($employees as $employee)
            <tr>
                <td>{{$employee->name}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->company->name}}</td>
                <td>
                    <a class="btn btn-primary" href="{{URL('/employees/edit/'.$employee->id)}}">Edit employee</a>
                    <a class="btn btn-primary" href="{{URL('/employees/delete/'.$employee->id)}}">Delete employee</a>
                </td>


            </tr>
        @endforeach

    </table>
@endsection
