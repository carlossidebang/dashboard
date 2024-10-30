<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'minlength' => 3, 'maxlength' => 150]) !!}
</div>

<!-- Place Of Birth Field -->
<div class="form-group col-sm-6">
    {!! Form::label('place_of_birth', 'Tempat Lahir:') !!}
    {!! Form::text('place_of_birth', null, ['class' => 'form-control', 'minlength' => 3, 'maxlength' => 50]) !!}
</div>

<!-- Birthday Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birthday_date', 'Tanggal Lahir:') !!}
    {!! Form::text('birthday_date', null, ['class' => 'form-control', 'id' => 'birthday_date']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Alamat:') !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'minlength' => 5]) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Jenis Kelamin:') !!}
    {!! Form::select('gender', ['pria' => 'pria', 'wanita' => 'wanita'], null, ['class' => 'form-control']) !!}
</div>

<!-- Occupation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('occupation', 'Pekerjaan:') !!}
    {!! Form::text('occupation', null, ['class' => 'form-control', 'minlength' => 3, 'maxlength' => 50]) !!}
</div>

<!-- Enter Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('enter_date', 'Tanggal Bergabung:') !!}
    {!! Form::text('enter_date', null, ['class' => 'form-control', 'id' => 'enter_date']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('congregations.index') }}" class="btn btn-secondary">Cancel</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $('#birthday_date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            icons: {
                up: "icon-arrow-up-circle icons font-2xl",
                down: "icon-arrow-down-circle icons font-2xl"
            },
            sideBySide: true
        })

        $('#enter_date').datetimepicker({
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
