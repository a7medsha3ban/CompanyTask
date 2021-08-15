@extends('Layouts.dashboard-layout')

@section('content')
    <div class="card-header">
        Companies
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
                Address
            </th>
            <th></th>
        </tr>
        </thead>

        @foreach($companies as $company)
            <tr>
                <td>{{$company->name}}</td>
                <td>{{$company->email}}</td>
                <td>{{$company->telephone}}</td>
                <td>{{$company->address}}</td>
                <td>
                    <a class="btn btn-primary" href="{{URL('/companies/show/'.$company->id)}}">Show company</a>
                    <a class="btn btn-primary" href="{{URL('/companies/edit/'.$company->id)}}">Edit company</a>
                    <a class="btn btn-primary" href="{{URL('/companies/delete/'.$company->id)}}">Delete company</a>
                </td>


            </tr>
        @endforeach

    </table>
@endsection
