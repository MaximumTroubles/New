@extends('layouts.main')

@section('content')
    <h3 class="text-center">Sale Page</h3>
    <div class="row">
        <div class="col-md-3">

            @include('store.parts._list-categories')


        </div>
        <div class="col-md-9">
            @include('store.parts._products-pag')
        </div>
    </div>

@endsection
