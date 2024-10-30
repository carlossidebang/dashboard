<!-- Nominal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nominal', 'Nominal:') !!}
    {!! Form::text('nominal', null, ['class' => 'form-control']) !!}
</div>

<!-- Outcome Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('outcome_date', 'Tanggal:') !!}
    {!! Form::text('outcome_date', null, ['class' => 'form-control','id'=>'outcome_date']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Deskripsi:') !!}
    {!! Form::text('description', null, ['class' => 'form-control','minlength' => 10,'maxlength' => 100]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('outcomes.index') }}" class="btn btn-secondary">Cancel</a>
</div>

@push('scripts')
   <script type="text/javascript">
           $('#outcome_date').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush
