@extends('admin.layouts.index')
@section('content')
    <h2>Просмотр заказа</h2>
    <p>
        <a href="/admin/order">
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left mr-2"></i>Назад к списку заказов
            </button>
        </a>
    </p>
    <table class="hover cell-border" id="dataTable">
        <thead>
            <tr>
                <td>Номер заказа</td>
                <td>#</td>
                <td>Изображение продукта</td>
                <td>Название продукта</td>
                <td>Цена продукта</td>
                <td>Количество продукта</td>
                <td>Итоговая цена продукта</td>
                <td>Инструменты</td>
            </tr>
        </thead>
        <tbody>
            @foreach($orderItems as $product)
                <tr>
                    <td>{{ $product->order_id }}</td>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ $product->product_img }}" alt="" width="100"></td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->product_price }}</td>
                    <td>{{ $product->product_qty }}</td>
                    <td>{{ $product->product_qty * $product->product_price }}</td>
                    <td>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6"></td>
                <td class="text-center">
                    Общая сумма заказа:
                </td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
                <td class="text-center">
                    @foreach ($totalSum  as $total)
                        <b>{{ $total->totalSum }} грн</b>
                    @endforeach
                </td>
                <td colspan="3"></td>
            </tr>
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
