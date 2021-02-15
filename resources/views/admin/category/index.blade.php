@extends('admin.layouts.index')

@section('content')
    <h1>Categories</h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>        
    @elseif(session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
    @endif
    <a href="{{ route('category.create') }}" class="btn btn-success mb-2">
        <i class="fas fa-plus mr-2"></i> Category
    </a>
    <table class="hover cell-border" id="dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ asset($item->img) }}" height="100" width="150" alt="" style="object-fit: contain"></td>
                <td>{{ $item->name }}</td>
                <td>
                    <a href="/admin/category/{{ $item->id }}/edit">
                        <button class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>
                        {!! Form::open(['url' => 'admin/category/'.$item->id, 'method' => 'delete', 'class' => 'd-inline']) !!}
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
                
            