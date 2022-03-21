@extends('layouts.admin')

@section('main')
    <div class="content-wrapper ">
        <div class="row justify-content-center ">

            <div class="col-md-8 grid-margin stretch-card ">
                <invoice-card invoice-number="{{ $invoiceNumber }}"></invoice-card>
            </div>

        </div>

    </div>
@endsection
