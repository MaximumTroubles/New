@extends('layouts.main')
@section('title', $category->name )
@section('content')
<div class="row">
    <div class="col-md-3">

        @include('store.parts._list-categories')


    </div>
    <div class="col-md-9">
            <h3 class="text-center">{{ $category->name }}</h3>
            @include('store.parts._products-pag')
        </div>
    </div>

@endsection
