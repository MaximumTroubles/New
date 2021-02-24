@extends('admin.layouts.index')

@section('content')
    <h2>Заказы</h2>

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

    {{-- create new order link --}}
    <a href="{{ route('order.create') }}" class="btn btn-success mb-2">
        <i class="fas fa-plus mr-2"></i> Order
    </a>
    {{-- create new order link --}}

    {{-- main order's table  --}}
    <table class="hover cell-border" id="dataTable">
        <thead>
            <tr>
                <td>#</td>
                <td>Номер заказа</td>
                <td>ФИО</td>
                <td>Телефон</td>
                <td>Адресс</td>
                <td>Общая Сумма</td>
                <td>Статус</td>
                <td>Дата и время заказа</td>
                <td>Дата и время измененния</td>
                <td>Редакт.</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders  as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        {{ $order->id }}
                        <a href="/admin/order/{{ $order->id }}" class="ml-3">
                            <button class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                            </button>
                        </a>
                    </td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->totalSum }}</td>
                    <td>{{ $order->status->name }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->updated_at }}</td>
                    <td>
                        <a href="/admin/order/{{ $order->id }}/edit">
                                <button class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                </button>
                        </a>

                        <form action="/admin/order/{{ $order->id }}" method="DELETE" class="d-inline">
                            <button class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
@section('js')
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        } );
    </script>
@endsection
