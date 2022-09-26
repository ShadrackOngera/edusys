@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            @foreach($chats as $item)
                <div class="card shadow mb-3">
                    <div class="card-body">
            @foreach($item as $chat)


                            <div>
                                @if($chat->sender_id  == auth()->user()->id)
                                    <span class="float-end">{{ $chat->message }}</span><br>
                                @else
                                    <span>{{ $chat->message }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('chats.store') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $chat->sender_id }}" name="sender_id">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" name="message" aria-describedby="button-addon2">
                                    <button class="btn btn-secondary" type="submit" id="button-addon2">
                                        Submit
                                    </button>
                                </div>
                            </form>
                   @endforeach

                        </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
