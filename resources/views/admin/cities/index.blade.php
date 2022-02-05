@extends('layouts.admin')

@section('main')

    <div class="row">
        <a class="w-auto" href="{{ route('city.create') }}">
            <button type="button" class="btn btn-primary mb-3">Add City</button>
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Hoverable Table</h4>
            <p class="card-description">
                Add class <code>.table-hover</code>
            </p>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>City</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($cities))
                            @foreach ($cities as $city)

                                <tr>
                                    <td>{{ $city['name'] }}</td>
                                    <td>
                                        <div class="d-flex">

                                            <a href="{{ route('city.edit', ['city' => $city->id]) }}">
                                                <label class=" badge badge-warning">edit</label>
                                            </a>
                                            <form method="POST"
                                                action="{{ route('city.destroy', ['city' => $city->id]) }}">
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
