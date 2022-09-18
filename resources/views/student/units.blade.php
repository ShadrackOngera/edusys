@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <h2>Here are all registered units</h2>

            <div>

                <table class="table">
                    <div class="d-flex justify-content-between">
                        <div>&nbsp;</div>
                        @can('create unit')
                            <div>
                                <a href="{{ route('units.create') }}" class="btn btn btn-primary">Add Unit</a>
                            </div>
                        @endcan
                    </div>
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
                                        <button class="btn btn-secondary">
                                            Delete
                                        </button>
                                    </td>
                                @endcan
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
