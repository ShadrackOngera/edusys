@extends('layouts.app')
@section('content')
    @if(Auth::user()->type === 1)
        <div class="container text-center">
            {{ __('You do not have access to this Page') }}
        </div>
    @else
        <div>
            <div class="container">
                <a href="#">Add More units</a>
            </div>
        </div>
    @endif
@endsection
