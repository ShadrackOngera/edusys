@extends('layouts.app')
@section('content')
    <div style="min-height: 70vh">
        <div class="container">
            <div class="mb-3">
                <h2>Hello <span class="text-capitalize">{{ auth()->user()->name }}</span>, Here are your results</h2>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Unit Id</th>
                        <th scope="col">Programme</th>
                        <th scope="col">Unit Code</th>
                        <th scope="col">Description</th>
                        <th scope="col">score (<span class="fst-italic"> x/100 </span>)</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Comment</th>
                        @can('create result')
                            <th scope="col">Update Score</th>
                        @endcan
                    </tr>
                </thead>

                <tbody>
                    @foreach($results as $result)
                        <tr>
                            <th scope="row">{{ $result->unit_id }}</th>
                            <td>{{ $result->programme }}</td>
                            <td>{{ $result->unit }}</td>
                            <td>{{ $result->description }}</td>
                            <td>
                                {{ $result->score }}
                            </td>
                            <td>
                                @if($result->score == null)
                                    <span>Not Graded</span>
                                @elseif($result->score < 40)
                                    <span>E</span>
                                @elseif($result->score < 50)
                                    <span>D</span>
                                @elseif($result->score < 60)
                                    <span>C</span>
                                @elseif($result->score < 100)
                                    <span>A</span>
                                @endif
                            </td>
                            <td>
                                @if($result->score == null)
                                    <span>No Results Yet</span>
                                @elseif($result->score <= 25)
                                    <span>Fail</span>
                                @elseif($result->score <= 50)
                                    <span>Average</span>
                                @elseif($result->score <= 75)
                                    <span>Good</span>
                                @elseif($result->score <= 90)
                                    <span>Excellent</span>
                                @endif
                            </td>
                            @can('create result')
                                    <td>
                                        <form action="{{ route('regUnits.update', $result->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" placeholder="Score" name="score">
                                            <input type="text" hidden value="{{ $result->unit_id }}" name="unit_id">
                                            <input type="text" hidden value="{{ $result->programme }}" name="programme">
                                            <input type="text" hidden value="{{ $result->unit }}" name="unit">
                                            <input type="text" hidden value="{{ $result->description }}" name="description">

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
        </div>
    </div>
@endsection
