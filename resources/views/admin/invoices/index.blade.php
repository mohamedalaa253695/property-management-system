@extends('layouts.admin')

@section('main')

    <div class="row">
        <a class="w-auto" href="{{ route('invoice.create') }}">
            <button type="button" class="btn btn-primary mb-3">Add Invoice</button>
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Invoice Number</th>
                            <th>property</th>
                            <th>customer name</th>
                            <th>customer email</th>
                            <th>qty</th>
                            <th>Description</th>
                            <th>total</th>
                            <th>#</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($invoices))
                            @foreach ($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice['invoice_number'] }}</td>
                                    <td>{{ $invoice['property_id'] }}</td>
                                    <td>{{ $invoice['customer_name'] }}</td>
                                    <td>{{ $invoice['customer_email'] }}</td>
                                    <td>{{ $invoice['qty'] }}</td>
                                    <td>{{ $invoice['description'] }}</td>
                                    <td>{{ $invoice['total'] }}</td>
                                    <td>
                                        <div class="d-flex">

                                            <a href="{{ route('invoice.edit', ['invoice' => $invoice->id]) }}">
                                                <label class=" badge badge-warning">edit</label>
                                            </a>
                                            <a href="{{ route('invoice.export', ['invoice' => $invoice->id]) }}">
                                                <label class=" badge badge-warning">export</label>
                                            </a>
                                            <form method="POST"
                                                action="{{ route('invoice.destroy', ['invoice' => $invoice->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="badge badge-danger">delete</button>

                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>












@endsection
