@if(session('cart'))
    <table class="table">
        <thead>
            <tr>
                <th>Картинка</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Сумма</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach (session('cart') as $product)
                <tr>
                    <td><img src="{{ $product['img'] }}" alt="" height="100" width="150"></td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['price'] }}</td>
                    <td>
                        <input type="number" value="{{ $product['qty'] }}" data-id="{{ $product['id'] }}" class="qty-item">
                    </td>
                    <td>{{ $product['price'] * $product['qty'] }}</td>
                    <td><button class="btn btn-danger remove-item" data-id="{{ $product['id'] }}">X</button></td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-right">Total:</td>
                <td>{{ session('totalSum') }}</td>
            </tr>
        </tfoot>
    </table>
@else
<p>В Вашей корзине пока не чего нету</p>
@endif
