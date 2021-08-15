@extends('Layouts.layout')
@section('content')

@if(Auth::user()->is_admin==0)
    <h1>Your Are Employee</h1>
@endif

@endsection
