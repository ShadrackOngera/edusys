@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="align-items-center">
            @if (\Session::has('message'))
                <div class="alert alert-success">
                    {!! \Session::get('message') !!}
                </div>
            @endif
        </div>
    </div>
    <div style="min-height: 70vh">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        @can('make admin')
                            <th scope="col">Make Staff</th>
                            <th scope="col">Make Admin</th>
                            <th scope="col">Make Student</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @can('make admin')
                                <td>
                                    <form action="{{ route('make.staff') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $user->id }}" name="user_id">
                                        <button type="Submit" class="btn btn-orange">
                                            Make Staff
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <form action="{{ route('make.admin') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $user->id }}" name="user_id">
                                        <button type="Submit" class="btn btn-orange">
                                            Make Admin
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('make.student') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $user->id }}" name="user_id">
                                        <button type="Submit" class="btn btn-success text-white">
                                            Make Student
                                        </button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-center">
            {!! $users->links("pagination::bootstrap-4") !!}
        </div>
    </div>
@endsection
