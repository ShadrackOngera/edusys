@extends('layouts.app')
@section('content')
    <div style="min-height: 70vh">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Account Type</th>
                        @can('make admin')
                            <th scope="col">Make Admin</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->type }}</td>
                            @can('make admin')
                                <td>
                                    <form action="{{ route('make.admin') }}">
                                        <input type="text" hidden value="{{ $user->id }}">
                                        <button type="Submit" class="btn btn-orange">
                                            MAke Admin
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
@endsection
