@extends('admin.layouts.index')
@section('content')
    <h2>Информация о заказе</h2>

    {{-- messages section --}}
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @elseif(session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
        @endif
    {{-- messages section --}}

    <table class="hover cell-border" id="dataTable">

    </table>

@endsection
