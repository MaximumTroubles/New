@extends('layouts.main')
@section('title', $title )

@section('content')
    <h3>Contacts Page</h3>
    @include('messages.errors')

    <form action="/contacts" method="POST" >
        @csrf
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="form-group col-3">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-3">
            <label for="email">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
             @enderror
        </div>

        <div class="form-group col-4">
            <label for="message">Message</label>
            <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" >{{ old('message') }}</textarea>
            @error('message')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            
            <button class="btn btn-primary mt-2">Send</button>
        </div>
    </form>
@endsection
@section('sidebar')
    <p>Adress:</p>
    @parent
@endsection