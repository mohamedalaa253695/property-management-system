@extends('layouts.admin')

@section('main')
    <div class="col-sm-12">
        <div class="home-tab">

            <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="">
                        <div class="col-md-12 ">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6">
                                    <div class="card-db l-bg-cherry">
                                        <div class="card-statistic-3 p-4">
                                            <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i>
                                            </div>
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0">Sold Properties</h5>
                                            </div>
                                            <div class="row align-items-center mb-2 d-flex">
                                                <div class="col-8">
                                                    <h2 class="d-flex align-items-center mb-0">
                                                        {{ count($sold) }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="card-db l-bg-blue-dark">
                                        <div class="card-statistic-3 p-4">
                                            <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0">Rented Properties</h5>
                                            </div>
                                            <div class="row align-items-center mb-2 d-flex">
                                                <div class="col-8">
                                                    <h2 class="d-flex align-items-center mb-0">
                                                        {{ count($rented) }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="card-db l-bg-green-dark">
                                        <div class="card-statistic-3 p-4">
                                            <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0">For Rent & Sale</h5>
                                            </div>
                                            <div class="row align-items-center mb-2 d-flex">
                                                <div class="col-8">
                                                    <h2 class="d-flex align-items-center mb-0">
                                                        {{ $avialableForSaleOrRent }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="card-db l-bg-orange-dark">
                                        <div class="card-statistic-3 p-4">
                                            <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0">Total Revenue</h5>
                                            </div>
                                            <div class="row align-items-center mb-2 d-flex">
                                                <div class="col-8">
                                                    <h2 class="d-flex align-items-center mb-0">
                                                        {{ $totalRevenue }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Sales this year</h4>
                                    <line-chart {{-- :labels='["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul","Aug", "Sep", "Oct", "Nov", "Dec"]' --}} :labels='{{ $sales->keys() }}'
                                        :values="{{ $sales->values() }}"></line-chart>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Invoices This Year</h4>
                                    <bar-chart :labels='{{ $invoices->keys() }}' :values="{{ $invoices->values() }}">
                                    </bar-chart>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
