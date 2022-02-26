@extends('layouts.admin')

@section('main')

    <div class="row">
        <a class="w-auto" href="{{ route('buildings.create') }}">
            <button type="button" class="btn btn-primary mb-3">Add Building</button>
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Complexes Table</h4>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Building</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($buildings))
                            @foreach ($buildings as $building)
                                <tr>
                                    <td>{{ $building['number'] }}</td>
                                    <td>
                                        <div class="d-flex">

                                            <a href="{{ route('buildings.edit', ['building' => $building->id]) }}">
                                                <label class=" badge badge-warning">edit</label>
                                            </a>
                                            <form method="POST"
                                                action="{{ route('buildings.destroy', ['building' => $building->id]) }}">
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
