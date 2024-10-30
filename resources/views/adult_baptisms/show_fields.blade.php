<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $adultBaptism->name }}</p>
</div>

<!-- Adult Baptism Date Field -->
<div class="form-group">
    {!! Form::label('adult_baptism_date', 'Adult Baptism Date:') !!}
    <p>{{ $adultBaptism->adult_baptism_date }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $adultBaptism->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $adultBaptism->updated_at }}</p>
</div>

