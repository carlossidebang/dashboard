<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $congregation->name }}</p>
</div>

<!-- Place Of Birth Field -->
<div class="form-group">
    {!! Form::label('place_of_birth', 'Place Of Birth:') !!}
    <p>{{ $congregation->place_of_birth }}</p>
</div>

<!-- Birthday Date Field -->
<div class="form-group">
    {!! Form::label('birthday_date', 'Birthday Date:') !!}
    <p>{{ $congregation->birthday_date }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $congregation->address }}</p>
</div>

<!-- Gender Field -->
<div class="form-group">
    {!! Form::label('gender', 'Gender:') !!}
    <p>{{ $congregation->gender }}</p>
</div>

<!-- Occupation Field -->
<div class="form-group">
    {!! Form::label('occupation', 'Occupation:') !!}
    <p>{{ $congregation->occupation }}</p>
</div>

