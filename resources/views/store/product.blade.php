@extends('layouts.main')
@section('title',$product->name)
@section('content')
    <img src="{{ $product->img }}" alt="{{ $product->name }}" height="250" width="300">

    <h3>{{ $product->name }}</h3>
    <p>
        Category: <a href="/category/{{ $category->slug }}">{{ $category->name }}</a>
    </p>

    @if ($product->action_price)
        <p style="color: red"><del> Sale: {{ $product->price }}</del></p>
        <p>{{ $product->action_price }}</p>
    @else
        <p>{{ $product->price }}</p>
    @endif

    {{-- buy section --}}
    {!! Form::open(['class' => 'form-add-to-cart']) !!}
        <div class="form-group col-md-2 d-inline-block">
            {!! Form::number('qty', 1 ,['class'=> 'form-control']) !!}
       </div>
        {!! Form::hidden('product_id', $product->id ) !!}
        <button class="btn btn-warning"><b>Buy</b></button>
    {!! Form::close() !!}

    <p>Description:</p>
    <p>{{ $product->description }}</p>

    <hr>

    {{-- Reviews section` --}}
    @include('messages.errors')
    @auth
        <form action="/product/{{ $category->slug }}" method="POST">
            @csrf
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <input type="hidden" name="product_id" value="{{$product->id}}">
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
