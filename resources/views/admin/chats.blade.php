@extends('layout.app')
@section('content')
    <div>
        <div class="container">
            @foreach($chats as $chat)
                <div class="card shadow mb-3">
                    <div class="card-body">
                        
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
            @endforeach
        </div>
    </div>
@endsection
