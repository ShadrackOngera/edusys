@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Unit Id</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Name of student</th>
                    <th scope="col">Programme</th>
                    <th scope="col">Unit Code</th>
                    <th scope="col">Description</th>
                    <th scope="col">score (<span class="fst-italic"> x/100 </span>)</th>
                    <th scope="col">Comment</th>
                    @can('create result')
                        <th scope="col">Update Score</th>
                    @endcan
                </tr>
                </thead>

                <tbody>
                @foreach($regUnits as $regUnit)
                    <tr>
                        <th scope="row">{{ $regUnit->unit_id }}</th>
                        <td>{{ $regUnit->user_id }}</td>
                        <td>{{ $regUnit->user->name }}</td>
                        <td>{{ $regUnit->programme }}</td>
                        <td>{{ $regUnit->unit }}</td>
                        <td>{{ $regUnit->description }}</td>
                        <td>
                            {{ $regUnit->score }}
                        </td>
                        <td>
                            @if($regUnit->score == null)
                                <span>No Results Yet</span>
                            @elseif($regUnit->score <= 25)
                                <span>Fail</span>
                            @elseif($regUnit->score <= 50)
                                <span>Average</span>
                            @elseif($regUnit->score <= 75)
                                <span>Good</span>
                            @elseif($regUnit->score <= 90)
                                <span>Excellent</span>
                            @endif
                        </td>
                        @can('create result')
                            <td>
                                <form action="{{ route('regUnits.update', ["id" => $regUnit->id]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" placeholder="Score" name="score">
                                    <input type="text" hidden value="{{ $regUnit->unit_id }}" name="unit_id">
                                    <input type="text" hidden value="{{ $regUnit->programme }}" name="programme">
                                    <input type="text" hidden value="{{ $regUnit->unit }}" name="unit">
                                    <input type="text" hidden value="{{ $regUnit->description }}" name="description">

                                    <button type="submit" class="btn btn-outline-warning">
                                        Submit
                                    </button>
                                </form>
                            </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
            </table>
        </div>
    </div>
@endsection
