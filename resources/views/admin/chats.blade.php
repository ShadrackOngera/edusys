@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <h2 class="text-center">All Chats From All Users</h2>
        </div>
    </div>
    <div class="py-5"></div>
    <div class="" style="min-height: 80vh">
        <div class="container">
            @foreach($chats as $item)
                <div class="card shadow mb-3">
                    <div class="card-body">
                        @foreach($item as $chat)
                            <div>
                                @if($chat->sender_id  == auth()->user()->id)
                                    <span class="float-end">{{ $chat->message }}</span><br>
                                @else
                                    <span class="">{{ $chat->message }}</span><br>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('chats.adminStore') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $chat->chat_id }}" name="chat_id">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Reply To Chat" aria-label="Recipient's username" name="message" aria-describedby="button-addon2">
                                <button class="btn btn-secondary" type="submit" id="button-addon2">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-center">
            {!! $chats->links("pagination::bootstrap-4") !!}
        </div>
    </div>
@endsection
