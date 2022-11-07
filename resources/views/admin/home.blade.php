@extends('layouts.app')
@section('content')
    <div style="min-height: 70vh">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h3 class="text-center">Quick Links</h3>
                    <div class="d-grid">
                        <a href="{{ route('units.index') }}" class="btn btn-outline-info mb-3">View All Units</a>

                        <a href="{{ route('users.all') }}" class="btn btn-outline-info mb-3">View All Users</a>

                        <a href="{{ route('admin.chats') }}" class="btn btn-outline-info mb-3">View All Chats</a>

                        <a href="{{ route('regUNits.all') }}" class="btn btn-outline-info mb-3">View All Registered Units</a>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="row text-center">
                        <div class="col-sm-4">
                            <div class="card shadow border-0 h-100 mb-3 rounded-3 py-5">
                                <h3 class="mb-3">Total Number of Units Registered</h3>
                                <p>
                                    56
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow border-0 h-100 mb-3 rounded-3 py-5">
                                <h3 class="mb-3">Total Number of Students Registered</h3>
                                <p>
                                    516
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow border-0 h-100 mb-3 rounded-3 py-5">
                                <h3 class="mb-3">Total Number of mails in Mailing list</h3>
                                <p>
                                    16
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
