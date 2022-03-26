@extends('layouts.admin')

@section('main')

    <form action="{{ route('status.bulkDelete') }}" method="POST">
        @csrf
        @method('DELETE')

        <div class="d-flex flex-row  ">
            <a class="w-auto  pe-3" href="{{ route('status.create') }}">
                <button type="button" class="btn btn-primary mb-3">Add status</button>
            </a>
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuSizeButton2"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2" style="">
                    <input type="submit" value="delete" class="dropdown-item">
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Status</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($statuses))
                                @foreach ($statuses as $status)
                                    <tr>
                                        <td><input type="checkbox" name="ids[]" value="{{ $status->id }}"></td>
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
    </form>

@endsection
