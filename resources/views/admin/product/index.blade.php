@extends('admin.layouts.index')

@section('content')
    <h1>Products</h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>        
    @elseif(session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
    @endif
    <a href="{{ asset('/admin/product/create') }}" class="btn btn-success mb-2">
        <i class="fas fa-plus mr-2"></i> Product
    </a>
    <table class="hover cell-border" id="dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Action price</th>
                <th>Recommended</th>
                <th>Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ asset($item->img) }}" height="100" width="150" alt="" style="object-fit: contain"></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->action_price }}</td>
                <td>{!! $item->recomended !!}</td>
                <td>
                    <a href="/admin/product/{{ $item->id }}/edit">
                        <button class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>
                    {!! Form::open(['url' => 'admin/product/'.$item->id, 'method' => 'delete', 'class' => 'd-inline']) !!}
                    <button class="btn btn-danger">  <i class="fas fa-trash-alt"></i> </button>
                    {!! Form::close() !!}
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