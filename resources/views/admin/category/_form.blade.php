<div class="form-group">
    {!! Form::label('name', 'Category Name:', ) !!}
    {!! Form::text('name', null, ['class'=>'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug', 'Category Slug:', ) !!}
    {!! Form::text('slug', null, ['class'=>'form-control' . ($errors->has('slug') ? ' is-invalid' : '')]) !!}
    @error('slug')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('description', 'Category Description:', ) !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>
{{-- <div class="form-group">
    {!! Form::label('imgUpload', 'Category Image:', ) !!}
    {!! Form::file('imgUpload', ['class'=>'form-control']) !!}
</div> --}}
<div class="input-group">
    <span class="input-group-btn">
      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
        <i class="fa fa-picture-o"></i> Choose
      </a>
    </span>
    <input id="thumbnail" class="form-control" type="text" name="img" value="@isset($category){{ $category->img }}@endisset">
  </div>
  <div id="holder" style="margin-top:15px;max-height:100px;"> 
    @isset($category)
        <img src="{{ $category->img }}" alt="" height="100">
    @endisset
</div>

<button class="btn btn-primary">Save</button>