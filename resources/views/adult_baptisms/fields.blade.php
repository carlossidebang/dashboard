<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 150]) !!}
</div>

<!-- Adult Baptism Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adult_baptism_date', 'Tanggal:') !!}
    {!! Form::text('adult_baptism_date', null, ['class' => 'form-control','id'=>'adult_baptism_date']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#adult_baptism_date').datetimepicker({
               format: 'DD-MM-YYYY HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('adultBaptisms.index') }}" class="btn btn-secondary">Cancel</a>
</div>
