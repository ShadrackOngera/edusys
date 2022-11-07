@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <form action="{{route('units.update', $unit->id)}}" method="POST" class="mb-3">
                @csrf
                @method('PUT')
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="{{ $unit->programme }}" name="programme">
                    <label for="floatingInput">Programme</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="{{ $unit->unit }}" name="unit">
                    <label for="floatingInput">Unit Code</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="{{ $unit->description }}" name="description">
                    <label for="floatingInput">Description</label>
                </div>
                <div class="d-grid mb-3">
                    <button class="btn btn-secondary" type="submit">
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
