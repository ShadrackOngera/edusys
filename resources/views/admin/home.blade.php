@extends('layouts.app')
@section('content')
    <div style="min-height: 70vh">
        <div class="container">
            <div class="col-md-8 d-grid mb-3">
                <a href="{{ route('units.index') }}" class="btn btn-outline-info">View All Units</a>
            </div>
            <div class="col-md-8 d-grid mb-3">
                <a href="{{ route('users.all') }}" class="btn btn-outline-info">View All Users</a>
            </div>
            <div class="col-md-8 d-grid mb-3">
                <a href="{{ route('admin.chats') }}" class="btn btn-outline-info">View All Chats</a>
            </div>
            <div class="col-md-8 d-grid mb-3">
                <a href="{{ route('regUNits.all') }}" class="btn btn-outline-info">View All Registered Units</a>
            </div>
        </div>
    </div>
@endsection
