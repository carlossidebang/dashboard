@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('congregations.index') }}">Congregation</a>
        </li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Details</strong>
                            <a href="{{ route('congregations.index') }}" class="btn btn-light">Back</a>
                        </div>
                        <div class="card-body">
                            @include('congregations.show_fields')
                            <button type="button" class="btn btn-primary mt-3" data-toggle="modal"
                                data-target="#death-modal">
                                Meninggal
                            </button>
                            <button type="button" class="btn btn-info mt-3" data-toggle="modal"
                                data-target="#out-modal">
                                Pindah
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Jemaat Meninggal --}}
    <div class="modal fade" id="death-modal" tabindex="-1" aria-labelledby="death-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form class="w-px-500 p-3 p-md-3 needs-validation" action="{{ route('congregation-death-status', ['id' => $congregation->id]) }}"
                    method="POST" role="form" novalidate>
                    @csrf
                    @method('put')
                    <div class="modal-header">
                        <h5 class="modal-title" id="death-modal">Jemaat Meninggal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row mb-3 form-group">
                                <label class="col-sm-3 col-form-label">Tanggal Meninggal</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="death_date" name="death_date"
                                        placeholder="Tanggal Meninggal" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Jemaat Pindah --}}
    <div class="modal fade" id="out-modal" tabindex="-1" aria-labelledby="out-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form class="w-px-500 p-3 p-md-3 needs-validation" action="{{ route('congregation-out-status', ['id' => $congregation->id]) }}"
                    method="POST" role="form" novalidate>
                    @csrf
                    @method('put')
                    <div class="modal-header">
                        <h5 class="modal-title" id="out-modal">Jemaat Pindah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row mb-3 form-group">
                                <label class="col-sm-3 col-form-label">Tanggal Pindah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="out_date" name="out_date"
                                        placeholder="Tanggal Pindah" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            document.addEventListener("DOMContentLoaded", function() {
                const forms = document.querySelectorAll('.needs-validation');
                Array.prototype.slice.call(forms).forEach((form) => {
                    form.addEventListener('submit', (event) => {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            });

            $('#death_date').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: true,
                icons: {
                    up: "icon-arrow-up-circle icons font-2xl",
                    down: "icon-arrow-down-circle icons font-2xl"
                },
                sideBySide: true
            })

            $('#out_date').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: true,
                icons: {
                    up: "icon-arrow-up-circle icons font-2xl",
                    down: "icon-arrow-down-circle icons font-2xl"
                },
                sideBySide: true
            })
        })
    </script>
@endpush
