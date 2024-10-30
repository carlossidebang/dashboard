@php
    $currentYear = now()->subYear(1)->format('Y');
@endphp

@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12 col-md-12 order-1">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="fw-semibold d-block mb-1">Jemaat Masuk ({{ $currentYear }})</span>
                                    <h3 class="card-title mb-2">{{ $enter_year->total_enter }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="fw-semibold d-block mb-1">Jemaat Keluar ({{ $currentYear }})</span>
                                    <h3 class="card-title mb-2">{{ $enter_year->total_out }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="fw-semibold d-block mb-1">Pemasukkan ({{ $currentYear }})</span>
                                    <h3 class="card-title mb-2">Rp {{ number_format($income_year->nominal, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="fw-semibold d-block mb-1">Pengeluaran (2023)</span>
                                    <h3 class="card-title mb-2">Rp. {{ number_format($outcome_year->nominal, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                    <div class="card">
                        <div class="row row-bordered g-0">
                            <div class="col-md-12">
                                <h5 class="card-header m-0 me-2 pb-3">Keuangan</h5>
                                <div id="totalRevenueChart" class="px-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Total Revenue -->
            </div>
        </div>
    </div>
    </div>
@endsection


@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection
