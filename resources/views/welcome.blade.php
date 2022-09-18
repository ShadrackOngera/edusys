@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <a href="{{ route('home.admin') }}" class="btn btn-primary">Login as Staff</a>
            <a href="{{ route('home.student') }}" class="btn btn-primary">Login as a Student</a>
        </div>
    </div>
@endsection
