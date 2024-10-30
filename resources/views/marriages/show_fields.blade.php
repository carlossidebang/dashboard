<!-- Husband Name Field -->
<div class="form-group">
    {!! Form::label('husband_name', 'Husband Name:') !!}
    <p>{{ $marriage->husband_name }}</p>
</div>

<!-- Wife Name Field -->
<div class="form-group">
    {!! Form::label('wife_name', 'Wife Name:') !!}
    <p>{{ $marriage->wife_name }}</p>
</div>

<!-- Marriage Date Field -->
<div class="form-group">
    {!! Form::label('marriage_date', 'Marriage Date:') !!}
    <p>{{ $marriage->marriage_date }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $marriage->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $marriage->updated_at }}</p>
</div>

