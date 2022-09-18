@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <div class="py-3"></div>
            <form action="{{ route('units.store') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Programme" name="programme">
                    <label for="floatingInput">Programme</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Unit" name="unit">
                    <label for="floatingInput">Unit Code</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Description" name="description">
                    <label for="floatingInput">Description</label>
                </div>
                <div class="d-grid mb-3">
                    <button class="btn btn-secondary" type="submit">
                        Add
                    </button>
                </div>
            </form>
            <div class="row">
                <div class="col-sm-6 d-grid mb-3">
                    <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
                </div>
                <div class="col-sm-6 d-grid">
                    <a href="{{ route('home.admin') }}" class="btn btn-primary">Admin Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection
