@extends('layouts.admin')

@section('main')

    <div class="row">
        <a class="w-auto" href="{{ route('governorate.create') }}">
            <button type="button" class="btn btn-primary mb-3">Add Governorate</button>
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Governorate</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($governorates))
                            @foreach ($governorates as $governorate)
                                <tr>
                                    <td>{{ $governorate['name'] }}</td>
                                    <td>
                                        <div class="d-flex">

                                            <a
                                                href="{{ route('governorate.edit', ['governorate' => $governorate->id]) }}">
                                                <label class=" badge badge-warning">edit</label>
                                            </a>
                                            <form method="POST"
                                                action="{{ route('governorate.destroy', ['governorate' => $governorate->id]) }}">
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
                {{ $governorates->onEachSide(1)->links() }}
            </div>
        </div>
    </div>












@endsection
