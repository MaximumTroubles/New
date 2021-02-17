@extends('layouts.main')
@section('title',$title)


@section('content')
    @include('main._slider')
    @include('store.parts._products-pag')
@endsection

