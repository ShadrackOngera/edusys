@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <h1>My Dashboard</h1>
            <h3>{{ Auth::user()->name }}</h3>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Chat Directly with the Admin</h3>
                    </div>
                    <div class="card-body">
                        @foreach($chats as $chat)
                            @if($chat->sender_id == auth()->user()->id)
                                <div>
                                    @if($chat->sender_id  == auth()->user()->id)
                                        <span class="float-end">{{ $chat->message }}</span><br>
                                    @else
                                        <span>{{ $chat->message }}</span>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                        <div class="card-footer">
                            <form action="{{ route('chats.store') }}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" name="message" aria-describedby="button-addon2">
                                    <button class="btn btn-secondary" type="submit" id="button-addon2">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
