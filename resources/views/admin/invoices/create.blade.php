@extends('layouts.admin')

@section('main')
    <div class="content-wrapper ">
        <div class="row justify-content-center ">

            <div class="col-md-8 grid-margin stretch-card ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Invoice</h4>
                        <form class="forms-sample" method="POST" action="{{ route('city.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Invoice Number </label>
                                <input type="text" class="form-control" name="invoice_number" placeholder="invoice Number"
                                    value="{{ $invoiceNumber }}" disabled>
                            </div>
                            <div class="row">
                                <search-properties></search-properties>

                                <div class="form-group col-3">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" name="price" placeholder="price" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="CustomerName">Customer Name </label>
                                    <input type="text" class="form-control" name="customer_name"
                                        placeholder="Customer Name" value="">
                                </div>
                                <div class="form-group col-6">
                                    <label for="CustomerName">Customer Email </label>
                                    <input type="text" class="form-control" name="customer_email"
                                        placeholder="Customer Email" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="CustomerName">Customer Address </label>
                                    <input type="text" class="form-control" name="customer_address"
                                        placeholder="Customer Address" value="">
                                </div>
                                <div class="form-group col-6">
                                    <label for="CustomerName">Customer Phone </label>
                                    <input type="text" class="form-control" name="customer_phone"
                                        placeholder="Customer Phone" value="">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
