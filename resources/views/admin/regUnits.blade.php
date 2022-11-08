@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Unit Id</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Programme</th>
                    <th scope="col">Unit Code</th>
                    <th scope="col">Description</th>
                    <th scope="col">Cat (<span class="fst-italic"> x/30 </span>)</th>
                    <th scope="col">Exam (<span class="fst-italic"> x/70 </span>)</th>
                    <th scope="col">Total</th>
                    <th scope="col">Grade</th>
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
                        <td>{{ $regUnit->programme }}</td>
                        <td>{{ $regUnit->unit }}</td>
                        <td>{{ $regUnit->description }}</td>
                        <td>
                            {{ $regUnit->score_one }}
                        </td>
                        <td>
                            {{ $regUnit->score_two }}
                        </td>
                        <td>
                            {{$score = $regUnit->score_two + $regUnit->score_one }}
                        </td>
                        <td>
                            @if( $score == null)
                                <span>Not Graded</span>
                            @elseif($score < 40)
                                <span>E</span>
                            @elseif($score < 50)
                                <span>D</span>
                            @elseif($score < 60)
                                <span>C</span>
                            @elseif($score < 100)
                                <span>A</span>
                            @endif
                        </td>
                        <td>
                            @if($score == null)
                                <span>No Results Yet</span>
                            @elseif($score <= 25)
                                <span>Fail</span>
                            @elseif($score <= 50)
                                <span>Average</span>
                            @elseif($score <= 75)
                                <span>Good</span>
                            @elseif($score <= 90)
                                <span>Excellent</span>
                            @endif
                        </td>
                        @can('create result')
                            <td>
                                <form action="{{ route('regUnits.update', ["id" => $regUnit->id]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" class="form-control" placeholder="Cat Score" name="score_one">
                                    <input type="number" class="form-control" placeholder="Exam Score" name="score_two">
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
