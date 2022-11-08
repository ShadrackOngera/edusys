@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <div class="dropdown mb-5">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    All Units
                </button>
                <ul class="dropdown-menu">
                    @foreach($units as $unit)
                        <li><a class="dropdown-item" href="#">{{ $unit->programme }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
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
                                @if($unit->regUnit()->where('user_id', auth()->user()->id)->exists())
                                    <form action="{{ route('regUnits.destroy', $unit->regUnit()->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger">
                                            De-Register Unit
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('regUnits.store') }}" method="POST">
                                        @csrf
                                        <input type="text" hidden value="{{ $unit->id }}" name="unit_id">
                                        <input type="text" hidden value="{{ $unit->programme }}" name="programme">
                                        <input type="text" hidden value="{{ $unit->unit }}" name="unit">
                                        <input type="text" hidden value="{{ $unit->description }}" name="description">

                                        <button type="submit" class="btn btn-outline-warning">
                                            Register
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-center">
            {!! $units->links("pagination::bootstrap-4") !!}
        </div>
    </div>
@endsection
