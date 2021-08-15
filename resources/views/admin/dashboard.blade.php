@extends('Layouts.dashboard-layout')

@section('content')
    @if($errors)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
@endsection
