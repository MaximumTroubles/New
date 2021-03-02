@extends('admin.layouts.index')
@section('content')
    <h1>Add Product</h1>
    @include('messages.errors')
    {!! Form::open(['url' => '/admin/product', 'files' => true ])!!}
        @include('admin/product/_form')
    {!! Form::close() !!}

@endsection
@section('js')
    {{-- CKeditor --}}
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    {{-- Stand alone button --}}
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    {{-- select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('description', options);
        $('#lfm').filemanager('image')


        $(document).ready(function() {
        $('.recomended_products').select2();
        });

    </script>
@endsection
