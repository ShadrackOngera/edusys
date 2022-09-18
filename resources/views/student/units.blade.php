@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <div class="mb-3">
                <h2>Here are all registered units</h2>
            </div>

            <div class="">
                <table class="table">
                    @can('create unit')
                        <div class="col-sm-4 d-grid float-end mb-3">
                            <a href="{{ route('units.create') }}" class="btn btn btn-primary">Add Unit</a>
                        </div>
                    @endcan
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Programme</th>
                            <th scope="col">Unit Code</th>
                            <th scope="col">Description</th>
                            @can('edit unit')
                                <th scope="col">Edit</th>
                            @endcan
                            @can('delete unit')
                                <th scope="col">Delete</th>
                            @endcan
                        </tr>
                    </thead>
                    @foreach($units as $unit)
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $unit->programme }}</td>
                                <td>{{ $unit->unit }}</td>
                                <td>{{ $unit->description }}</td>
                                @can('edit unit')
                                    <td>
                                        <button class="btn btn-secondary">
                                            Edit
                                        </button>
                                    </td>
                                @endcan
                                @can('delete unit')
                                    <td>
                                        <form action="{{route('units.destroy',$unit->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="py-3"></div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 d-grid">
                    <a href="{{ route('home.admin') }}" class="btn btn-outline-primary">Home</a>
                </div>
                <div class="col-sm-4 d-grid">
                    <a href="{{ route('home.admin') }}" class="btn btn-outline-primary">Home</a>
                </div>
                <div class="col-sm-4 d-grid">
                    <a href="{{ route('units.create') }}" class="btn btn-outline-primary">Add Unit</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-center">
            {!! $units->links("pagination::bootstrap-4") !!}
        </div>
    </div>
@endsection
