@extends('layouts.main')
@section('content')
<h3>Reviews Page</h3>
@include('messages.errors')

@auth
<form action="/reviews" method="POST">
    @csrf
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="from-group col-3">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="from-group col-3">
        <label for="message">Message</label>
        <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror"></textarea>
        @error('name')
             <div class="invalid-feedback">{{ $message }}</div>
         @enderror
    </div>
    <button class="btn btn-primary mt-2 mb-4 ">Send</button>
</form>
@else
    
    <p>
        For leave review please
        <a href="/login">Login</a> or
        <a href="/register">Register</a>
    </p>
@endauth
@forelse ($reviews as $item)
    <div class="border col-3 mb-2">
        <div class="">
            Name:
            <p><strong>{{ $item->name }}</strong></p>
        </div>
        <div class="">
            Created at:
            <p>
                {{  $item->created_at }}
            </p>
        </div>
        <div class="">
            Review:
            <p>{{ $item->review }}</p>
        </div>
    </div>
@empty
    <p>No reviews</p>
@endforelse

{{ $reviews->links() }}
@endsection