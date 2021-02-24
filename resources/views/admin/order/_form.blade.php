<div class="form-group">
    {!! Form::label('name', 'ФИО клиента:' ) !!}
    {!! Form::text('name', null, ['class'=>'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('phone', 'Номер телефона:' ) !!}
    {!! Form::tel('phone', null, ['class'=>'form-control' . ($errors->has('phone') ? ' is-invalid' : '')]) !!}
    @error('phone')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('address', 'Aдресс доставки:' ) !!}
    {!! Form::text('address', null, ['class'=>'form-control' . ($errors->has('address') ? ' is-invalid' : '')]) !!}
    @error('address')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('status', 'Статус заказа') !!}
    {!! Form::select('status', $statuses, null, ['class' =>'form-control'] )!!}
</div>
<button class="btn btn-success">Save</button>
