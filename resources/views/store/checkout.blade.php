@extends('layouts.main')
@section('title', 'Checkout')
@section('content')
    <h2>Checkout</h2>
    <div class="modal-body">
        @include('store.parts._cart')
    </div>

    {!! Form::open(['url' => '/checkout']) !!}
        <div class="form-group">
            {!! Form::label('name') !!}
            {!! Form::text('name',null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('phone') !!}
            {!! Form::tel('phone',null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('address') !!}
            {!! Form::text('address',null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('checkout' , ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection
