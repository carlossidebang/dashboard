<!-- Nominal Field -->
<div class="form-group">
    {!! Form::label('nominal', 'Nominal:') !!}
    <p>{{ $outcome->nominal }}</p>
</div>

<!-- Outcome Date Field -->
<div class="form-group">
    {!! Form::label('outcome_date', 'Outcome Date:') !!}
    <p>{{ $outcome->outcome_date }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $outcome->description }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $outcome->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $outcome->updated_at }}</p>
</div>

