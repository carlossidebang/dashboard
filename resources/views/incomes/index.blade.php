@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Pendapatan</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">Total Pemasukan (2024)</span>
                            <h3 class="card-title mb-2">Rp. {{ number_format($income_year->nominal, 0, ',', '.') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">Pemuda (2024)</span>
                            <h3 class="card-title mb-2">Rp. {{ number_format($income_youth->nominal, 0, ',', '.') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">Sekolah Minggu (2024)</span>
                            <h3 class="card-title mb-2">Rp {{ number_format($income_kid->nominal, 0, ',', '.') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">Persembahan Minggu (2024)</span>
                            <h3 class="card-title mb-2">Rp. {{ number_format($income_routine->nominal, 0, ',', '.') }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="px-0 mb-2 col-3">
                    {!! Form::select(
                        'year',
                        [
                            '2018' => '2018',
                            '2019' => '2019',
                            '2020' => '2020',
                            '2021' => '2021',
                            '2022' => '2022',
                            '2023' => '2023',
                            '2024' => '2024',
                        ],
                        null,
                        [
                            'id' => 'year-selector',
                            'class' => 'form-control',
                        ],
                    ) !!}
                </div>
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-12">
                            <h5 class="card-header m-0 me-2 pb-3">Pemasukan</h5>
                            <div id="keuanganChart" class="px-2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            Pendapatan
                            <a class="pull-right" href="{{ route('incomes.create') }}"><i
                                    class="fa fa-plus-square fa-lg"></i></a>
                        </div>
                        <div class="card-body">
                            @include('incomes.table')
                            <div class="pull-right mr-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboard-keuangan.js') }}"></script>
@endsection
