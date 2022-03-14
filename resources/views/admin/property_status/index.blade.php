@extends('layouts.admin')

@section('main')

    <div class="row">
        <a class="w-auto" href="{{ route('status.create') }}">
            <button type="button" class="btn btn-primary mb-3">Add status</button>
        </a>
    </div>
    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($statuses))
                            @foreach ($statuses as $status)
                                <tr>
                                    <td>{{ $status['name'] }}</td>
                                    <td>
                                        <div class="d-flex">

                                            <a href="{{ route('status.edit', ['status' => $status->id]) }}">
                                                <label class=" badge badge-warning">edit</label>
                                            </a>
                                            <form method="POST"
                                                action="{{ route('status.destroy', ['status' => $status->id]) }}">
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
