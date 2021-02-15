@extends('layouts.main')
@section('title', $category->name )
@section('content')
    <h3>{{ $category->name }}</h3>
    @include('store.parts._products-pag')       
@endsection