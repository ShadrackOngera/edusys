@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Programme</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Description</th>
                        <th scope="col">Register</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($units as $unit)
                        <tr>
                            <th scope="row">{{ $unit->id }}</th>
                            <td>{{ $unit->programme }}</td>
                            <td>{{ $unit->unit }}</td>
                            <td>{{ $unit->description }}</td>
                            <td>
                                <form action="{{ route('regUnits.post') }}" method="POST">
                                    @csrf
                                    <input type="text" hidden value="{{ $unit->id }}" name="unit_id">
                                    <input type="text" hidden value="{{ $unit->programme }}" name="programme">
                                    <input type="text" hidden value="{{ $unit->unit }}" name="unit">
                                    <input type="text" hidden value="{{ $unit->description }}" name="description">

                                    <button type="submit" class="btn btn-outline-warning">
                                        Register
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
