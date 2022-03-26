@extends('layouts.admin')

@section('main')

    <div class="row">
        <a class="w-auto" href="{{ route('country.create') }}">
            <button type="button" class="btn btn-primary mb-3">Add country</button>
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Country</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($countries))
                            @foreach ($countries as $country)
                                <tr>
                                    <td>{{ $country['country_name'] }}</td>
                                    <td>
                                        <div class="d-flex">

                                            <a href="{{ route('country.edit', ['id' => $country->id]) }}">
                                                <label class=" badge badge-warning">edit</label>
                                            </a>
                                            <form method="POST"
                                                action="{{ route('country.destroy', ['id' => $country->id]) }}">
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
                {{ $countries->onEachSide(1)->links() }}
            </div>
        </div>
    </div>












@endsection
