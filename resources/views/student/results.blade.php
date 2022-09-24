@extends('layouts.app')
@section('content')
    <div>
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
                                20
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
