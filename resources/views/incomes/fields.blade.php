<!-- Income Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('income_date', 'Income Date:') !!}
    {!! Form::text('income_date', null, ['class' => 'form-control','id'=>'income_date']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#income_date').datetimepicker({
               format: 'YYYY-MM-DD',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Nominal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nominal', 'Nominal:') !!}
    {!! Form::text('nominal', null, ['class' => 'form-control']) !!}
</div>

<!-- Service Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_category_id', 'Service Category Id:') !!}
    {!! Form::text('service_category_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('incomes.index') }}" class="btn btn-secondary">Cancel</a>
</div>
