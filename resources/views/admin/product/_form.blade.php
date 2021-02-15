<div class="form-group">
    {!! Form::label('name', 'Product Name:' ) !!}
    {!! Form::text('name', null, ['class'=>'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug', 'Product Slug:', ) !!}
    {!! Form::text('slug', null, ['class'=>'form-control' . ($errors->has('slug') ? ' is-invalid' : '')]) !!}
    @error('slug')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('category', 'Product Slug:', ) !!}
     {!! Form::select('category_id', $categories ,) !!}

</div>
<div class="form-group">
    {!! Form::label('description', 'Product Description:', ) !!}
    {!! Form::textarea('description', null, ['class'=>'form-control' . ($errors->has('description') ? ' is-invalid' : '')]) !!}
    @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('price', 'Product Price:', ) !!}
    {!! Form::number('price', null, ['class'=>'form-control' .($errors->has('price') ? ' is-invalid' : '')]) !!}
    @error('price')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('action_price', 'Product Action Price:', ) !!}
    {!! Form::number('action_price', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('recomended', 'Product Recommended:', ) !!}
    {!! Form::checkbox('recomended', '1', false) !!}
</div>

<div class="input-group">
    <span class="input-group-btn">
      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
        <i class="fa fa-picture-o"></i> Choose
      </a>
    </span>
    <input id="thumbnail" class="form-control col-6 {{ ($errors->has('price') ? ' is-invalid' : '') }}" type="text" name="img" value="@isset($product) {{ $product->img }} @endisset">
    @error('price')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div id="holder" style="margin-top:15px;max-height:100px;"> 
    @isset($product)
        <img src="{{ $product->img }}" alt="" height="100">
    @endisset
</div>

<button class="btn btn-success">Save</button>