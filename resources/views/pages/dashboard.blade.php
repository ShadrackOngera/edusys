@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <h1>My Dashboard</h1>
            <h3>{{ Auth::user()->name }}</h3>
        </div>
    </div>
@endsection
