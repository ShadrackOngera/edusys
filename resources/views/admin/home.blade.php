@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <div class="col-md-8 d-grid mb-3">
                <a href="{{ route('units.index') }}" class="btn btn-outline-info">View All Units</a>
            </div>
            <div class="col-md-8 d-grid mb-3">
                <a href="{{ route('users.all') }}" class="btn btn-outline-info">View All Users</a>
            </div>
        </div>
    </div>
@endsection
