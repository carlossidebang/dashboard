<!-- Husband Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('husband_name', 'Nama Suami:') !!}
    <select class="form-control" name="husband_name">
        <option disabled selected>Pilih Nama Suami</option>
        @foreach ($unmarriedMen as $suami)
            <option value="{{$suami->name}}">{{$suami->name}}</option>
        @endforeach
    </select>
</div>

<!-- Wife Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('wife_name', 'Nama Istri:') !!}
    <select class="form-control" name="wife_name">
        <option disabled selected>Pilih Nama Istri</option>
        @foreach ($unmarriedWomen as $istri)
            <option value="{{$istri->name}}">{{$istri->name}}</option>
        @endforeach
    </select>
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
