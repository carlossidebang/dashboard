<!-- Husband Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('husband_name', 'Nama Suami:') !!}
    {!! Form::text('husband_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Wife Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('wife_name', 'Nama Istri:') !!}
    {!! Form::text('wife_name', null, ['class' => 'form-control', 'minlength' => 3, 'maxlength' => 150]) !!}
</div>

<!-- Marriage Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marriage_date', 'Tanggal Pernikahan:') !!}
    {!! Form::text('marriage_date', null, ['class' => 'form-control', 'id' => 'marriage_date']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('marriages.index') }}" class="btn btn-secondary">Cancel</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $('#marriage_date').datetimepicker({
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
