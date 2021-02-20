@extends('layouts.main')
@section('title',$product->name)
@section('content')
    <div class="row mt-2">
        <div class="col-md-3">
            @include('store.parts._list-categories')
        </div>
        <div class="col-md-9">
            {{-- Карточка товара --}}
            <div class="product_cart_container">
                <div class="product_img">
                    <img src="{{ $product->img }}" alt="{{ $product->name }}" height="250" width="300">
                </div>
                <div class="product_cart">
                    <div class="prodcut_cart_item_title">
                        <h3>{{ $product->name }}</h3>
                    </div>
                    <div class="prodcut_cart_item_category">
                        <p>
                            Category: <a href="/category/{{ $category->slug }}">{{ $category->name }}</a>
                        </p>
                    </div>

                    <div class="product_cart_item_price">
                        @if ($product->action_price)
                        <p class="product_cart_item_price__sale"> Было: <del> {{ $product->price }}</del> грн</></p>
                        <p>{{ $product->action_price }} грн</p>
                        @else
                        <p>{{ $product->price }} грн</p>
                        @endif
                    </div>
                    {{-- buy section --}}
                    <div class="product_cart_item_qty_button">
                        {!! Form::open(['class' => 'form-add-to-cart']) !!}
                            <div class="form-group">
                                {!! Form::number('qty', 1 ,['class'=> 'form-control qty_input']) !!}
                                {!! Form::hidden('product_id', $product->id ) !!}
                                <button class="btn btn-warning buy_button"><b>Buy</b></button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            {{-- Описание товара --}}
            <hr>
            <p><b>Description:</b></p>
            <p>{!! $product->description !!}</p>
        </div>
    </div>
    {{-- Recommnded section --}}
    <hr>
    <h2>C этим товарам так же покупают:</h2>
    <div class="rec_container d-flex justify-content-between">
        @foreach ($recommended as $item)
            <div class="small-product d-flex flex-column  justify-content-between align-items-center border border-warning" style="height: auto">
                <img src="{{ $item->img }}" alt="{{ $item->name }}" height="100" width="150">
                <div class="product_name">
                    <a href="{{ $item->slug }}">{{ $item->name}}</a>
                </div>
                    @if ($item->action_price)
                        <p style="color: red"><del> Sale: {{ $item->price }}</del></p>
                        <p>{{ $item->action_price }}</p>
                    @else
                        <p>{{ $item->price }}</p>
                    @endif
                </div>

        @endforeach
    </div>
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
