<div class="d-flex  flex-wrap justify-content-center p-3">
    @foreach ($products as $product)
        @include('store.parts._product')
    @endforeach
</div>
{{ $products->links() }}
