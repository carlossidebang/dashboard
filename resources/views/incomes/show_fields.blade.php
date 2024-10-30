<!-- Income Date Field -->
<div class="form-group">
    {!! Form::label('income_date', 'Income Date:') !!}
    <p>{{ $income->income_date }}</p>
</div>

<!-- Nominal Field -->
<div class="form-group">
    {!! Form::label('nominal', 'Nominal:') !!}
    <p>{{ $income->nominal }}</p>
</div>

<!-- Service Category Id Field -->
<div class="form-group">
    {!! Form::label('service_category_id', 'Service Category Id:') !!}
    <p>{{ $income->service_category_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $income->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $income->updated_at }}</p>
</div>

